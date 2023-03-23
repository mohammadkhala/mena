<?php 

namespace App\Exports;
use App\Models\Children;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class ChildrenViewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(Children::exportViewFields());
        $this->rec_id = $rec_id;
    }


    public function query()
    {
        return $this->query->where("id", $this->rec_id);
    }


	public function headings(): array
    {
        return [
			'Id',
			'Name',
			'Date Of Birth',
			'Address',
			'Gender',
			'Image',
			'Medical Status Id',
			'Medical Status Diagnosis',
			'Medical Status Solution',
			'Medical Status Cost',
			'Medical Status Children Id'
        ];
    }


    public function map($record): array
    {
        return [
			$record->id,
			$record->name,
			$record->date_of_birth,
			$record->address,
			$record->gender,
			$record->image,
			$record->medical_status_id,
			$record->medical_status_diagnosis,
			$record->medical_status_solution,
			$record->medical_status_cost,
			$record->medical_status_children_id
        ];
    }
}
