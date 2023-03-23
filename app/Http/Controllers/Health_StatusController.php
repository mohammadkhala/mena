<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Health_StatusAddRequest;
use App\Http\Requests\Health_StatusEditRequest;
use App\Models\Health_Status;
use Illuminate\Http\Request;
use \PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HealthStatusListExport;
use App\Exports\HealthStatusViewExport;
use Exception;
class Health_StatusController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.health_status.list";
		$query = Health_Status::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Health_Status::search($query, $search); // search table records
		}
		$query->join("children", "health_status.children_id", "=", "children.id");
		$orderby = $request->orderby ?? "health_status.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		// if request format is for export example:- product/index?export=pdf
		if($this->getExportFormat()){
			return $this->ExportList($query); // export current query
		}
		$records = $query->paginate($limit, Health_Status::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Health_Status::query();
		$query->join("children", "health_status.children_id", "=", "children.id");
		// if request format is for export example:- product/view/344?export=pdf
		if($this->getExportFormat()){
			return $this->ExportView($query, $rec_id);
		}
		$record = $query->findOrFail($rec_id, Health_Status::viewFields());
		return $this->renderView("pages.health_status.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.health_status.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Health_StatusAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Health_Status record
		$record = Health_Status::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("health_status", __('recordAddedSuccessfully'));
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Health_StatusEditRequest $request, $rec_id = null){
		$query = Health_Status::query();
		$record = $query->findOrFail($rec_id, Health_Status::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("health_status", __('recordUpdatedSuccessfully'));
		}
		return $this->renderView("pages.health_status.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Health_Status::query();
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
		$filename = "ListHealth_StatusReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$records = $query->get(Health_Status::exportListFields());
			return view("reports.health_status-list", ["records" => $records]);
		}
		elseif($format == "pdf"){
			$records = $query->get(Health_Status::exportListFields());
			$pdf = PDF::loadView("reports.health_status-list", ["records" => $records]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new HealthStatusListExport($query), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new HealthStatusListExport($query), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
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
		$filename ="ViewHealth_StatusReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$record = $query->findOrFail($rec_id, Health_Status::exportViewFields());
			return view("reports.health_status-view", ["record" => $record]);
		}
		elseif($format == "pdf"){
			$record = $query->findOrFail($rec_id, Health_Status::exportViewFields());
			$pdf = PDF::loadView("reports.health_status-view", ["record" => $record]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new HealthStatusViewExport($query, $rec_id), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new HealthStatusViewExport($query, $rec_id), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
}
