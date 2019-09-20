<?php
use Illuminate\Http\Request;
use App\Category;

Route::group(['middleware' => 'auth'], function(){

	Route::get('/post', 'PostController@index');

Route::group(['middleware' => 'mod.check'], function(){
	
	Route::get('post/add-new', 'PostController@addNew')->name('post.add');
	Route::post('post/add-new', 'PostController@saveAddNew');

	Route::get('post/edit/{id}', 'PostController@editForm')->name('post.edit');
	Route::post('post/edit/{id}', 'PostController@saveEdit');
	//sua

	Route::get('post/xoa/{id}','PostController@XoaPost')->name('post.delete');
});
	//sadasdh
	//danhmuc

	Route::get('/cate', 'CategoriesController@index');
Route::group(['middleware' => 'mod.check'], function(){
	//xóadanhmuc
	Route::get('xoa/{id}', function($id){
			$cate= Category::destroy($id);
            DB::table('products')->where('category_id', '=', $id)->delete();
			return redirect('/cate');
		})->name('deletecate');
	//add danh mục
	Route::get('cate/add-new', 'CategoriesController@addNew')->name('cate.add');
	Route::post('cate/add-new', 'CategoriesController@saveAddNew');
	//edit

	Route::get('cate/edit/{id}', 'CategoriesController@editForm')->name('cate.edit');
	Route::post('cate/edit/{id}', 'CategoriesController@saveEdit');
	
});
	//404
	Route::get('/403', function(){
		return view('auth/403');
	});
	//hompage
	Route::get('/homepage', function(){
		return view('index');
	});
	///
	


});

Route::get('cp-login', 'Auth\LoginController@loginForm')->name('login');
Route::post('cp-login', 'Auth\LoginController@postLogin');
Route::any('logout', 'Auth\LoginController@logout')->name('logout');



