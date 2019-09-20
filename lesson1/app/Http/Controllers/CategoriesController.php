<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CateRequest;
class CategoriesController extends Controller
{
    public function index(Request $request){
 
			if(!$request->has('keyword') || empty($request->keyword) ){
				$cate =Category::paginate(10);
				}else{
				 $kw = $request->keyword;
				 $cate = Category::where('name', 'like', "%$kw%")
								->paginate(10);
				 $cate->withPath("?keyword=$kw");
			}
			return view('cate/list-categories',[
				'baiviet'=>$cate
			]);
 	}

 	 public function addNew(){
    	$model = new Category();
    	// $authors = User::all();
    	// $cates = Category::all();
    	return view('cate.add-form', compact('model'));
    }
    public function saveAddNew(CateRequest $request){
    	$model = new Category();

        if($request->hasFile('image')){
           
            $oriFileName = $request->image->getClientOriginalName();
            $filename = str_replace(' ', '-', $oriFileName);
            $filename = uniqid() . '-' . $filename;
            $path = $request->file('image')->storeAs('posts', $filename);
            $model->image = 'images/'.$path;
        }
        
    	$model->fill($request->all());
    	// dd($model);
    	$model->save();
    	return redirect('/cate');
    }
    //sửa danh mục
     public function editForm($id){
        $model = Category::find($id);
        if(!$model){
            return redirect('/cate');
        }
        $cates = Category::all();
        // $authors = User::all();
        return view('cate.edit-form', compact('model', 'cates'));
    }

    public function saveEdit(CateRequest $request){
        $model = Category::find($request->id);
        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs('posts', 
            str_replace(' ', '-', uniqid() . '-' .$request->image->getClientOriginalName()));
            $model->image = 'images/'.$path;
        }
        $model->fill($request->all());
        $model->save();
        return redirect('/cate');
    }
  
    //xóa
    
}
