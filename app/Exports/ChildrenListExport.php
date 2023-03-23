<?php 

namespace App\Exports;
use App\Models\Children;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class ChildrenListExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
	
	protected $query;
	
    public function __construct($query)
    {
        $this->query = $query->select(Children::exportListFields());
    }
	
    public function query()
    {
        return $this->query;
    }
	
	public function headings(): array
    {
        return [
			'Id',
			'Name',
			'Date Of Birth',
			'Address',
			'Gender',
			'Image'
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
			$record->image
        ];
    }
}
