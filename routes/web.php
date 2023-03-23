<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



	Route::get('', 'IndexController@index')->name('index')->middleware(['redirect.to.home']);
	Route::get('index/login', 'IndexController@login')->name('login');
	
	Route::post('auth/login', 'AuthController@login')->name('auth.login');
	Route::any('auth/logout', 'AuthController@logout')->name('logout')->middleware(['auth']);

	Route::get('auth/accountcreated', 'AuthController@accountcreated')->name('accountcreated');
	Route::get('auth/accountpending', 'AuthController@accountpending')->name('accountpending');
	Route::get('auth/accountblocked', 'AuthController@accountblocked')->name('accountblocked');
	Route::get('auth/accountinactive', 'AuthController@accountinactive')->name('accountinactive');


	
	Route::get('auth/register', 'AuthController@register')->name('auth.register')->middleware(['redirect.to.home']);
	Route::post('auth/register', 'AuthController@register_store')->name('auth.register_store');
		
	Route::post('auth/login', 'AuthController@login')->name('auth.login');
	Route::get('auth/password/forgotpassword', 'AuthController@showForgotPassword')->name('password.forgotpassword');
	Route::post('auth/password/sendemail', 'AuthController@sendPasswordResetLink')->name('password.email');
	Route::get('auth/password/reset', 'AuthController@showResetPassword')->name('password.reset.token');
	Route::post('auth/password/resetpassword', 'AuthController@resetPassword')->name('password.resetpassword');
	Route::get('auth/password/resetcompleted', 'AuthController@passwordResetCompleted')->name('password.resetcompleted');
	Route::get('auth/password/linksent', 'AuthController@passwordResetLinkSent')->name('password.resetlinksent');
	

/**
 * All routes which requires auth
 */
Route::middleware(['auth'])->group(function () {
		
	Route::get('home', 'HomeController@index')->name('home');

	

/* routes for Children Controller */	
	Route::get('children', 'ChildrenController@index')->name('children.index');
	Route::get('children/index', 'ChildrenController@index')->name('children.index');
	Route::get('children/index/{filter?}/{filtervalue?}', 'ChildrenController@index')->name('children.index');	
	Route::get('children/view/{rec_id}', 'ChildrenController@view')->name('children.view');
	Route::get('children/masterdetail/{rec_id}', 'ChildrenController@masterDetail')->name('children.masterdetail');	
	Route::get('children/add', 'ChildrenController@add')->name('children.add');
	Route::post('children/add', 'ChildrenController@store')->name('children.store');
		
	Route::any('children/edit/{rec_id}', 'ChildrenController@edit')->name('children.edit');Route::any('children/editfield/{rec_id}', 'ChildrenController@editfield');	
	Route::get('children/delete/{rec_id}', 'ChildrenController@delete');

/* routes for Health_Status Controller */	
	Route::get('health_status', 'Health_StatusController@index')->name('health_status.index');
	Route::get('health_status/index', 'Health_StatusController@index')->name('health_status.index');
	Route::get('health_status/index/{filter?}/{filtervalue?}', 'Health_StatusController@index')->name('health_status.index');	
	Route::get('health_status/view/{rec_id}', 'Health_StatusController@view')->name('health_status.view');	
	Route::get('health_status/add', 'Health_StatusController@add')->name('health_status.add');
	Route::post('health_status/add', 'Health_StatusController@store')->name('health_status.store');
		
	Route::any('health_status/edit/{rec_id}', 'Health_StatusController@edit')->name('health_status.edit');Route::any('health_status/editfield/{rec_id}', 'Health_StatusController@editfield');	
	Route::get('health_status/delete/{rec_id}', 'Health_StatusController@delete');

/* routes for Marital_Status Controller */	
	Route::get('marital_status', 'Marital_StatusController@index')->name('marital_status.index');
	Route::get('marital_status/index', 'Marital_StatusController@index')->name('marital_status.index');
	Route::get('marital_status/index/{filter?}/{filtervalue?}', 'Marital_StatusController@index')->name('marital_status.index');	
	Route::get('marital_status/view/{rec_id}', 'Marital_StatusController@view')->name('marital_status.view');	
	Route::get('marital_status/add', 'Marital_StatusController@add')->name('marital_status.add');
	Route::post('marital_status/add', 'Marital_StatusController@store')->name('marital_status.store');
		
	Route::any('marital_status/edit/{rec_id}', 'Marital_StatusController@edit')->name('marital_status.edit');Route::any('marital_status/editfield/{rec_id}', 'Marital_StatusController@editfield');	
	Route::get('marital_status/delete/{rec_id}', 'Marital_StatusController@delete');

/* routes for Medical_Status Controller */	
	Route::get('medical_status', 'Medical_StatusController@index')->name('medical_status.index');
	Route::get('medical_status/index', 'Medical_StatusController@index')->name('medical_status.index');
	Route::get('medical_status/index/{filter?}/{filtervalue?}', 'Medical_StatusController@index')->name('medical_status.index');	
	Route::get('medical_status/view/{rec_id}', 'Medical_StatusController@view')->name('medical_status.view');	
	Route::get('medical_status/add', 'Medical_StatusController@add')->name('medical_status.add');
	Route::post('medical_status/add', 'Medical_StatusController@store')->name('medical_status.store');
		
	Route::any('medical_status/edit/{rec_id}', 'Medical_StatusController@edit')->name('medical_status.edit');Route::any('medical_status/editfield/{rec_id}', 'Medical_StatusController@editfield');	
	Route::get('medical_status/delete/{rec_id}', 'Medical_StatusController@delete');

/* routes for Users Controller */	
	Route::get('users', 'UsersController@index')->name('users.index');
	Route::get('users/index', 'UsersController@index')->name('users.index');
	Route::get('users/index/{filter?}/{filtervalue?}', 'UsersController@index')->name('users.index');	
	Route::get('users/view/{rec_id}', 'UsersController@view')->name('users.view');	
	Route::any('account/edit', 'AccountController@edit')->name('account.edit');	
	Route::get('account', 'AccountController@index');	
	Route::post('account/changepassword', 'AccountController@changepassword')->name('account.changepassword');	
	Route::get('users/add', 'UsersController@add')->name('users.add');
	Route::post('users/add', 'UsersController@store')->name('users.store');
		
	Route::any('users/edit/{rec_id}', 'UsersController@edit')->name('users.edit');	
	Route::get('users/delete/{rec_id}', 'UsersController@delete');
});


	
Route::get('componentsdata/name_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->name_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/users_username_value_exist',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->users_username_value_exist($request);
	}
);
	
Route::get('componentsdata/users_email_value_exist',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->users_email_value_exist($request);
	}
);


Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');


/**
 * All static content routes
 */
Route::get('info/about',  function(){
		return view("pages.info.about");
	}
);
Route::get('info/faq',  function(){
		return view("pages.info.faq");
	}
);

Route::get('info/contact',  function(){
	return view("pages.info.contact");
}
);
Route::get('info/contactsent',  function(){
	return view("pages.info.contactsent");
}
);

Route::post('info/contact',  function(Request $request){
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);

		$senderName = $request->name;
		$senderEmail = $request->email;
		$message = $request->message;

		$receiverEmail = config("mail.from.address");

		Mail::send(
			'pages.info.contactemail', [
				'name' => $senderName,
				'email' => $senderEmail,
				'comment' => $message
			],
			function ($mail) use ($senderEmail, $receiverEmail) {
				$mail->from($senderEmail);
				$mail->to($receiverEmail)
					->subject('Contact Form');
			}
		);
		return redirect("info/contactsent");
	}
);


Route::get('info/features',  function(){
		return view("pages.info.features");
	}
);
Route::get('info/privacypolicy',  function(){
		return view("pages.info.privacypolicy");
	}
);
Route::get('info/termsandconditions',  function(){
		return view("pages.info.termsandconditions");
	}
);

Route::get('info/changelocale/{locale}', function ($locale) {
	app()->setlocale($locale);
	session()->put('locale', $locale);
    return redirect()->back();
})->name('info.changelocale');