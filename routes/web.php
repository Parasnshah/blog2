<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', function () {
    return view('welcome');
})->name('home');

Route::post('check_email','Auth\RegisterController@check_email');
Route::post('registers','Auth\RegisterController@store');
Route::post('logins','Auth\LoginController@dologin');
Route::get('contact','ContactController@index');
Route::post('contact','ContactController@get_contact');
Auth::routes();


//Admin section
Route::group(['prefix' => 'admin','middleware'=>['auth','admin'],'namespace'=>'Admin'],function(){
	Route::get('user','Admincontroller@view_users');
	Route::get('delete_user','Admincontroller@delete_user');
	Route::get('view_user','Admincontroller@view_user');
	Route::get('change_user_status','Admincontroller@change_user_status');
	Route::post('add_edit_user','Admincontroller@add_edit_user');
	Route::get('deleted_user','Admincontroller@deleted_user');
	Route::get('manage_deleted_user','Admincontroller@manage_deleted_user');
	Route::get('restore_user','Admincontroller@restore_user');
	Route::get('restore_all_user','Admincontroller@restore_all_user');



	Route::get('manage_user','Admincontroller@manage_user');
	Route::get('dashboard', 'Admincontroller@index');
	Route::get('logout','Admincontroller@logout');

	Route::get('user_activity','Admincontroller@user_activity');


	Route::get('manage_user_activity','Admincontroller@manage_user_activity');
	Route::get('profile', 'Admincontroller@profile');
	Route::post('profile','Admin\Admincontroller@save_profile');
	Route::get('change_password', 'Admincontroller@cpassword');
	Route::post('change_password','Admincontroller@change_password');
	Route::post('check_email','Admincontroller@check_email');
	
	Route::get('manage_admin','Admincontroller@manage_admin');
	Route::get('admin','Admincontroller@admin');
	Route::get('deleted_user','Admincontroller@deleted_user');
	Route::get('delete_all_user','Admincontroller@delete_all_user');
	Route::get('edit_user/{id}','Admincontroller@edit_user');
	Route::post('update_user','Admincontroller@update_user');
	Route::get('restore/{id}','Admincontroller@restore');
	Route::get('delete_user/{id}','Admincontroller@delete_user');
	//Route::get('inquery','Admincontroller@inquery_listing');
});
//Route::get('/home', 'HomeController@index')->name('home');
