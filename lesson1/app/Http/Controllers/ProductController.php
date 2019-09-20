<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
class ProductController extends Controller
{
    public function index(Request $request){
 
		if(!$request->has('keyword') || empty($request->keyword) ){
			$products = Product::paginate(5);
			}else{
			 $kw = $request->keyword;
			 $products = Product::where('name', 'like', "%$kw%")
							->paginate(5);
			 $products->withPath("?keyword=$kw");
		}
	return view('products/list-product',[
			'baiviet'=>$products
		]);
    }

    public function addNew(){
    	$model = new Product();
    	$cates = Category::all();
    	return view('products.add-form', compact('model', 'cates'));
    }

      public function saveAddNew(ProductRequest $request){
      	
    	$model = new Product();

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
    	return redirect(route('home'));    
    }

    //edit
    public function editForm($id){
        $model = Product::find($id);
        if(!$model){
           return redirect(route('home'));
        }
        $cates = Category::all();
        return view('products.edit-form', compact('model', 'cates'));
    }

    public function saveEdit(ProductRequest $request){
        $model = Product::find($request->id);
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
       return redirect(route('home'));
    }
    //test
    
    // public function falsstatus(Request $request){
    //     $flight = Product::find($request->id);
    //     if($flight->status == 0){
    //         $flight->status = 1;
    //     }
    //     else{
    //         $flight->status = 0;
    //     }
    //     $flight->save();
    //     return redirect(route('home'));


    // }


    //xoa
     public function XoaPost($id){
            $post= Product::destroy($id);
            return redirect(route('home')); 
        }


}
