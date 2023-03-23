<?php 

namespace App\Exports;
use App\Models\Marital_Status;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class MaritalStatusListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Marital_Status::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Id',
			'Diagnosis',
			'Solution',
			'Cost',
			'Children Id',
			'Children Name'
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
			$record->children_name
        ];
    }
}
