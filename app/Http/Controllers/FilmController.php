<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    
    public function index(){
        return Film::get();
    }

    public function show($id){
        return Film::find($id);
    }

    public function create(Request $request){
        try{
            $request->validate([
                'title'=>'required',
                'description'=>'required',
                'premiere'=>'required'

            ]);
        }catch (\Throwable $th){
            return response()->json(['error' => $th->getMessage()],400);
        }

        Film::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'premiere'=>$request->premiere
        ]);
        return 'creada con exito';
    }

    public function update(Request $request, $id){
        Film::where('id', $id)
            ->update(['title' => $request->title,
                'premiere' => $request->premiere,
                'description' => $request->description,]);

        return 'actualizado con exito';


    }

    public function destroy($id){
        Film::where('id',$id)->delete();
        return 'Eliminado con exito ';
    }
    
}
