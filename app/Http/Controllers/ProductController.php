<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function addProduct(Request $request){
                      
        $request->validate([
            "item_id"         => 'required|exists:items,id',
            "category_id"     => 'required|exists:categories,id',
            "sub_category_id" => 'required|exists:sub_categories,id',
            "title"           => 'required',       
            "negotiable"      => 'required',       
            "price"           => 'required',       
            "condition"       => 'required',
            "description"     => 'required',
            "min_quantity"    => 'required'
        ]);
        $product                  = new Product();
        $product->item_id         = $request->item_id;
        $product->category_id     = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->title           = $request->title;
        $product->negotiable      = $request->negotiable;
        $product->price           = $request->price;
        $product->condition       = $request->condition;
        $product->description     = $request->description;
        $product->min_quantity    = $request->min_quantity;
        $product->save();
        return response()->json([
            "status"  => 1,
            "message" => "Product added successfully",                
        ]);
     }
    
}
