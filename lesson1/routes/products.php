<?php 

use Illuminate\Http\Request;

Route::group(['middleware' => 'auth'], function(){


	Route::get('/', 'ProductController@index')->name('home');
	Route::group(['middleware' => 'mod.check'], function(){
		Route::get('add-new', 'ProductController@addNew')->name('product.add');
		Route::post('add-new', 'ProductController@saveAddNew');
		//edit
		Route::get('edit/{id}', 'ProductController@editForm')->name('product.edit');
		Route::post('edit/{id}', 'ProductController@saveEdit');
		//xóa\
		Route::get('xoa/{id}','ProductController@XoaPost')->name('deleteproduct');
	});
	

});

 ?>