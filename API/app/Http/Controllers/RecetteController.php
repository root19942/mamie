<?php

namespace App\Http\Controllers;


use App\Recette;

use Illuminate\Http\Request;


class RecetteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
     
     $recettes = Recette::all();

     return response()->json($recettes);

    }

     public function create(Request $request)
     {
        $recette = new Recette;

       $recette->name= $request->name;
       $recette->dificulte = $request->dificulte;
       $recette->recette= $request->recette;
       
       $recette->save();

       return response()->json($recette);
     }

     public function show($id)
     {
        $recette = Recette::find($id);

        return response()->json($recette);
     }

     public function update(Request $request, $id)
     { 
        $recette= Recette::find($id);
        
        $recette->name = $request->input('name');
        $recette->dificulte = $request->input('dificulte');
        $recette->recette = $request->input('recette');
        $recette->save();
        return response()->json($recette);
     }

     public function destroy($id)
     {
        $recette = Recette::find($id);
        $recette->delete();

         return response()->json('recette removed successfully');
     }


}