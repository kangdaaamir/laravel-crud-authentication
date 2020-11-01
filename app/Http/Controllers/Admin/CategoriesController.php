<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use Session;

class CategoriesController extends Controller
{
  public function index()
    {
        $categories = Categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_title'           => 'required|unique:category',
            'status'          => 'required',
        ]);
       
        $categories = new categories;

        $categories->category_title =$request->category_title;       
		$categories->category_slug = str_slug($request->category_title);
        $categories->status  = $request->status;

        if($categories->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Category Successfully Added.',
                'type'  => 'success',
            ];
            
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Occurred While Adding a Category.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        
        $category = categories::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_title'           => 'required|unique:category,category_title,' . $id,
            'status'          => 'required',
        ]);

        $categories = categories::findOrFail($id);

        $categories->category_title      = $request->category_title;
        $categories->category_slug = str_slug($request->category_title);
        $categories->status     = $request->status;

       
        if($categories->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Category Successfully Updated.',
                'type'  => 'success',
            ];
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Update The Category.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('admin.categories.index');
    }

    public function delete(Request $request)
    {
        $categories = categories::findOrFail($request->id);
        if($categories->delete())
        {
            $alert_toast = 
            [
                'title' =>  'Operation Successful : ',
                'text'  =>  'categories Successfully Deleted.',
                'type'  =>  'success',
            ];
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Deleting The categories.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('admin.categories.index');
    }

}
