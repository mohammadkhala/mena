<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChildrenAddRequest;
use App\Http\Requests\ChildrenEditRequest;
use App\Models\Children;
use Illuminate\Http\Request;
use \PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ChildrenListExport;
use App\Exports\ChildrenViewExport;
use Exception;
class ChildrenController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.children.list";
		$query = Children::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Children::search($query, $search); // search table records
		}
		$query->join("health_status", "children.id", "=", "health_status.children_id");
		$query->join("marital_status", "children.id", "=", "marital_status.children_id");
		$query->join("medical_status", "children.id", "=", "medical_status.children_id");
		$orderby = $request->orderby ?? "children.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		// if request format is for export example:- product/index?export=pdf
		if($this->getExportFormat()){
			return $this->ExportList($query); // export current query
		}
		$records = $query->paginate($limit, Children::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Children::query();
		$query->join("health_status", "children.id", "=", "health_status.children_id");
		$query->join("marital_status", "children.id", "=", "marital_status.children_id");
		$query->join("medical_status", "children.id", "=", "medical_status.children_id");
		// if request format is for export example:- product/view/344?export=pdf
		if($this->getExportFormat()){
			return $this->ExportView($query, $rec_id);
		}
		$record = $query->findOrFail($rec_id, Children::viewFields());
		return $this->renderView("pages.children.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.children.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.children.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(ChildrenAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("image", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['image'], "image");
			$modeldata['image'] = $fileInfo['filepath'];
		}
		
		//save Children record
		$record = Children::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("children", __('recordAddedSuccessfully'));
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(ChildrenEditRequest $request, $rec_id = null){
		$query = Children::query();
		$record = $query->findOrFail($rec_id, Children::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("image", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['image'], "image");
			$modeldata['image'] = $fileInfo['filepath'];
		}
			$record->update($modeldata);
			return $this->redirect("children", __('recordUpdatedSuccessfully'));
		}
		return $this->renderView("pages.children.edit", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Children::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, __('recordDeletedSuccessfully'));
	}
	

	/**
     * Export table records to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $query
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportList($query){
		ob_end_clean(); // clean any output to allow file download
		$filename = "ListChildrenReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$records = $query->get(Children::exportListFields());
			return view("reports.children-list", ["records" => $records]);
		}
		elseif($format == "pdf"){
			$records = $query->get(Children::exportListFields());
			$pdf = PDF::loadView("reports.children-list", ["records" => $records]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new ChildrenListExport($query), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new ChildrenListExport($query), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
	

	/**
     * Export single record to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $record
	 * @param string $rec_id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportView($query, $rec_id){
		ob_end_clean();// clean any output to allow file download
		$filename ="ViewChildrenReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$record = $query->findOrFail($rec_id, Children::exportViewFields());
			return view("reports.children-view", ["record" => $record]);
		}
		elseif($format == "pdf"){
			$record = $query->findOrFail($rec_id, Children::exportViewFields());
			$pdf = PDF::loadView("reports.children-view", ["record" => $record]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new ChildrenViewExport($query, $rec_id), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new ChildrenViewExport($query, $rec_id), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
}
