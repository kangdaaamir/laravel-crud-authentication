<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Session;
use Auth;
use App\Models\Categories;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
  public function get_list()
    {
          $input = Input::all();

        $products = Products::select('product.*','category.category_title')->leftJoin('category', 'category.id', '=', 'product.categories')->where('categories',$input['category_id'])->get();
       // $categories=Categories::all();
        return response()->json($products);
    }


 public function search_product()
    {
          $input = Input::all();

        $products = Products::select('product.*','category.category_title')->leftJoin('category', 'category.id', '=', 'product.categories')->where('product_title','LIKE',$input['search_text']. '%')->get();
       // $categories=Categories::all();
        return response()->json($products);
    }

    public function get_product_details()
    {
          $input = Input::all();
          $user_id=Auth::guard('api')->user()->id;

        $products = Products::select('product.*','category.category_title')->leftJoin('category', 'category.id', '=', 'product.categories')->where('product.id',$input['product_id'])->get();
       // $categories=Categories::all();
        return response()->json($products);
    }

    
}
