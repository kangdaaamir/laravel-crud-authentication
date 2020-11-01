<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use Session;

class CategoriesController extends Controller
{
  public function get_list()
    {
        $categories = Categories::all();

 
        return response()->json($categories);
        //return response()->json(['success' => $categories], $this-> successStatus);
    }

    

}
