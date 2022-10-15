<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\subCategory;


class CategoryController extends Controller
{
    public function addCategory(Request $request){
        $request->validate([
            "name"      => 'required',
            "type"      => 'required',
            "is_active" => 'required'
        ]);
        $category            = new Category();
        $category->name      = $request->name;
        $category->type      = $request->type;
        $category->is_active = $request->is_active;
        $category->save();
        return response()->json([
            "status"  => 1,
            "message" => "Category added successfully",                
        ]);
        
    }
    public function allCategories(){      
        $allCategories = Category::orderBy('id')->get();
        return response()->json([
           "status"  => 1,
           "message" => "Total Categories",
           "Data"    => $allCategories
        ]);
     }

     public function addSubCategories(Request $request){
        $request->validate([
            "name"      => 'required',
            "parent_id" => 'required|exists:categories,id',          
            "is_active" => 'required'
        ]);
        $subCategory            = new subCategory();
        $subCategory->name      = $request->name;
        $subCategory->parent_id = $request->parent_id;
        $subCategory->is_active = $request->is_active;
        $subCategory->save();
        return response()->json([
            "status"  => 1,
            "message" => "SubCategory added successfully",                
        ]);
     }
}
