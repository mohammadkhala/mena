<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Children extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'children';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'name','date_of_birth','address','gender','image'
	];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				children.name LIKE ?  OR 
				children.address LIKE ?  OR 
				children.gender LIKE ?  OR 
				health_status.diagnosis LIKE ?  OR 
				health_status.solution LIKE ?  OR 
				marital_status.diagnosis LIKE ?  OR 
				marital_status.solution LIKE ?  OR 
				marital_status.cost LIKE ?  OR 
				medical_status.diagnosis LIKE ?  OR 
				medical_status.solution LIKE ?  OR 
				medical_status.children_id LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"children.id AS id",
			"children.name AS name",
			"children.date_of_birth AS date_of_birth",
			"children.address AS address",
			"children.gender AS gender",
			"children.image AS image",
			"health_status.id AS health_status_id",
			"marital_status.id AS marital_status_id",
			"medical_status.id AS medical_status_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"children.id AS id",
			"children.name AS name",
			"children.date_of_birth AS date_of_birth",
			"children.address AS address",
			"children.gender AS gender",
			"children.image AS image",
			"health_status.id AS health_status_id",
			"marital_status.id AS marital_status_id",
			"medical_status.id AS medical_status_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"children.image AS image",
			"children.id AS id",
			"children.name AS name",
			"children.date_of_birth AS date_of_birth",
			"children.address AS address",
			"children.gender AS gender",
			"health_status.diagnosis AS health_status_diagnosis",
			"health_status.solution AS health_status_solution",
			"health_status.cost AS health_status_cost",
			"marital_status.diagnosis AS marital_status_diagnosis",
			"marital_status.solution AS marital_status_solution",
			"marital_status.cost AS marital_status_cost",
			"medical_status.diagnosis AS medical_status_diagnosis",
			"medical_status.solution AS medical_status_solution",
			"medical_status.cost AS medical_status_cost",
			"health_status.id AS health_status_id",
			"marital_status.id AS marital_status_id",
			"medical_status.id AS medical_status_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"children.image AS image",
			"children.id AS id",
			"children.name AS name",
			"children.date_of_birth AS date_of_birth",
			"children.address AS address",
			"children.gender AS gender",
			"health_status.diagnosis AS health_status_diagnosis",
			"health_status.solution AS health_status_solution",
			"health_status.cost AS health_status_cost",
			"marital_status.diagnosis AS marital_status_diagnosis",
			"marital_status.solution AS marital_status_solution",
			"marital_status.cost AS marital_status_cost",
			"medical_status.diagnosis AS medical_status_diagnosis",
			"medical_status.solution AS medical_status_solution",
			"medical_status.cost AS medical_status_cost",
			"health_status.id AS health_status_id",
			"marital_status.id AS marital_status_id",
			"medical_status.id AS medical_status_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"name",
			"date_of_birth",
			"address",
			"gender",
			"image",
			"id" 
		];
	}
}
