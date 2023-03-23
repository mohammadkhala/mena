<?php 

namespace App\Exports;
use App\Models\Medical_Status;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class MedicalStatusViewExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	protected $query;

	protected $rec_id;

    public function __construct($query, $rec_id)
    {
        $this->query = $query->select(Medical_Status::exportViewFields());
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
			'Diagnosis',
			'Solution',
			'Cost',
			'Children Id',
			'Children Name',
			'Children Date Of Birth',
			'Children Address',
			'Children Gender',
			'Children Image'
        ];
    }


    public function map($record): array
    {
        return [
			$record->id,
			$record->diagnosis,
			$record->solution,
			$record->cost,
			$record->children_id,
			$record->children_name,
			$record->children_date_of_birth,
			$record->children_address,
			$record->children_gender,
			$record->children_image
        ];
    }
}
