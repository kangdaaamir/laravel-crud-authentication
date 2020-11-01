<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Categories;

class ProductController extends Controller
{
  public function index()
    {
        $products = Products::select('product.*','category.category_title')->leftJoin('category', 'category.id', '=', 'product.categories')->get();
       // $categories=Categories::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
    	$categories=Categories::all();
        return view('admin.products.create', compact('categories'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_title'           => 'required|unique:product',
            'product_description'          => 'required',
            'categories'          => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'          => 'required',
        ]);
       
        $products = new products;

        $products->categories =$request->categories;
        $products->product_title =$request->product_title;       
		$products->product_slug = str_slug($request->product_title);
		$products->product_description =$request->product_description; 


		if ($files = $request->file('image')) {
			$destinationPath = public_path('product');

			
			 
			//$destinationPath = 'public/product/'; // upload path
			$profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
			$files->move($destinationPath, $profileImage);
			$products->featured_image = "$profileImage";
		}

        $products->status  = $request->status;

        if($products->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Product Successfully Added.',
                'type'  => 'success',
            ];
            
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Occurred While Adding a Product.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        
        $product = products::findOrFail($id);
        $categories=Categories::all();
        return view('admin.products.edit',  compact('product','categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_title'            => 'required|unique:product,product_title,' . $id,
            'product_description'          => 'required',
            'categories'          => 'required',
            'status'	=> 'required',
        ]);

        $products = products::findOrFail($id);




        if ($files = $request->file('image')) {
			$destinationPath = public_path('product');
			$profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
			$files->move($destinationPath, $profileImage);
			$products->featured_image= "$profileImage";
		}

		$products->categories =$request->categories;
     	 $products->product_title =$request->product_title;       
		$products->product_slug = str_slug($request->product_title);
		$products->product_description =$request->product_description;   
        $products->status  = $request->status;

       
        if($products->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Product Successfully Updated.',
                'type'  => 'success',
            ];
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Update The Product.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('admin.products.index');
    }

    public function delete(Request $request)
    {
        $products = products::findOrFail($request->id);
        if($products->delete())
        {
            $alert_toast = 
            [
                'title' =>  'Operation Successful : ',
                'text'  =>  'product Successfully Deleted.',
                'type'  =>  'success',
            ];
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Deleting The product.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('admin.products.index');
    }

}
