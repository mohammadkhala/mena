<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Medical_Status extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'medical_status';
	

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
		'diagnosis','solution','cost','children_id'
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
				medical_status.diagnosis LIKE ?  OR 
				medical_status.solution LIKE ?  OR 
				medical_status.children_id LIKE ?  OR 
				children.name LIKE ?  OR 
				children.address LIKE ?  OR 
				children.gender LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"medical_status.id AS id",
			"medical_status.diagnosis AS diagnosis",
			"medical_status.solution AS solution",
			"medical_status.cost AS cost",
			"medical_status.children_id AS children_id",
			"children.id AS children_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"medical_status.id AS id",
			"medical_status.diagnosis AS diagnosis",
			"medical_status.solution AS solution",
			"medical_status.cost AS cost",
			"medical_status.children_id AS children_id",
			"children.id AS children_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"medical_status.id AS id",
			"medical_status.diagnosis AS diagnosis",
			"medical_status.solution AS solution",
			"medical_status.cost AS cost",
			"medical_status.children_id AS children_id",
			"children.id AS children_id",
			"children.name AS children_name",
			"children.date_of_birth AS children_date_of_birth",
			"children.address AS children_address",
			"children.gender AS children_gender",
			"children.image AS children_image" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"medical_status.id AS id",
			"medical_status.diagnosis AS diagnosis",
			"medical_status.solution AS solution",
			"medical_status.cost AS cost",
			"medical_status.children_id AS children_id",
			"children.id AS children_id",
			"children.name AS children_name",
			"children.date_of_birth AS children_date_of_birth",
			"children.address AS children_address",
			"children.gender AS children_gender",
			"children.image AS children_image" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"diagnosis",
			"solution",
			"cost",
			"children_id",
			"id" 
		];
	}
}
