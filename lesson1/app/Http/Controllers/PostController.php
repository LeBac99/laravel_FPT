<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddFormRequest;

use App\Post;
use App\User;
use App\Category;
class PostController extends Controller
{
    public function index(Request $request){
 
		if(!$request->has('keyword') || empty($request->keyword) ){
			$posts = Post::paginate(5);
			}else{
			 $kw = $request->keyword;
			 $posts = Post::where('title', 'like', "%$kw%")
							->paginate(5);
			 $posts->withPath("?keyword=$kw");
		}
	return view('posts/list-post',[
			'baiviet'=>$posts
		]);
    }

    public function addNew(){
    	$model = new Post();
    	$authors = User::all();
    	$cates = Category::all();
    	return view('posts.add-form', compact('model', 'authors', 'cates'));
    }
    public function saveAddNew(AddFormRequest $request){
    	$model = new Post();

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
    	return redirect('/post');
    }

    public function editForm($id){
        $model = Post::find($id);
        if(!$model){
            return redirect()->route('/post');
        }
        $cates = Category::all();
        $authors = User::all();
        return view('posts.edit-form', compact('model', 'cates', 'authors'));
    }

    public function saveEdit(AddFormRequest $request){
        $model = Post::find($request->id);
        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs('posts', 
            str_replace(' ', '-', uniqid() . '-' .$request->image->getClientOriginalName()));
            $model->image = 'images/'.$path;
        }
        if($request->status == null) {
            $model->status = 0;
        }
        $model->fill($request->all());
        $model->save();
        return redirect('/post');
    }

    //
    public function falsstatus(Request $request){
        $flight = Post::find($request->id);
        if($flight->status == 0){
            $flight->status = 1;
        }
        else{
            $flight->status = 0;
        }
        $flight->save();
        return redirect('/post');


    }
    //xóa

    public function XoaPost($id){
			$post= Post::destroy($id);
			return redirect('/post');
		}
    

}
