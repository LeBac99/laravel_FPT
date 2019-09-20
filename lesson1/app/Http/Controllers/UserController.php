<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
      public function index(Request $request){
 
		if(!$request->has('keyword') || empty($request->keyword) ){
			$products = Product::paginate(5);
			}else{
			 $kw = $request->keyword;
			 $products = Product::where('title', 'like', "%$kw%")
							->paginate(5);
			 $products->withPath("?keyword=$kw");
		}
	return view('products/list-product',[
			'baiviet'=>$products
		]);
    }
}
