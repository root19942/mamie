<?php

namespace App\Http\Controllers;


use App\Product;

use Illuminate\Http\Request;
use App\Recette;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {

     $products = Product::all();

     return response()->json($products);

    }

     public function create(Request $request)
     {
        $product = new Product;

       $product->name= $request->name;
       $product->price = $request->price;
       $product->description= $request->description;

       $product->save();

       return response()->json($product);
     }

     public function show($id)
     {
        $product = Product::find($id);

        return response()->json($product);
     }

     public function update(Request $request, $id)
     {
        $product= Product::find($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();
        return response()->json($product);
     }

     public function destroy($id)
     {
        $product = Product::find($id);
        $product->delete();

         return response()->json('product removed successfully');
     }

     public function search($text)
     {
         $products = Product::where('name', 'like', '%'.$text.'%')->orWhere('description','like','%'.$text.'%')->get();
         $recettes = Recette::where('name','like','%'.$text.'%')->orWhere('recette','like','%'.$text.'%')->get();
         $array_products = [];
         $array_recettes = [];
         foreach ($products as $product) {
            $array_products = [
               "name" => $product->name,
               "description" => $product->description,
               "unit_price" => $product->unit_price,
               "type" => "product"
            ];
         }
         foreach ($recettes as $recette) {
            $array_recettes = [
               "name" => $recette->name,
               "description" => $recette->description,
               "type" => "recette"
            ];
         }
         $array_merge = array_merge($array_products,$array_recettes);
         return response()->json($array_merge, 200);
     }

    }
