
<?php
	class Menu{
		
	public static function navbarsideleft(){
		return [
		[
			'path' => 'home',
			'label' => __('home'), 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'children',
			'label' => __('children'), 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'health_status',
			'label' => __('healthStatus'), 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'medical_status',
			'label' => __('medicalStatus'), 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'users',
			'label' => __('users'), 
			'icon' => '<i class="material-icons">extension</i>'
		],
		
		[
			'path' => 'marital_status',
			'label' => __('maritalStatus'), 
			'icon' => '<i class="material-icons">extension</i>'
		]
	] ;
	}
	
		
	public static function gender(){
		return [
		[
			'value' => 'Male', 
			'label' => __('male'), 
		],
		[
			'value' => 'Female', 
			'label' => __('female'), 
		],] ;
	}
	
	}
