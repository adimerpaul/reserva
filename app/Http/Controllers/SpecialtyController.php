<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Specialty::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $specialty=new Specialty([
            "descripcion"=>$request->get("descripcion"),
            "name"=>$request->get("name"),
            "color"=>$request->get("color")

        ]);
        $specialty->save();
//        return $request->get("descripcion");
        if($request->hasFile('file')){
            $path = $request->file->storeAs('specialities', $specialty->id.'.jpg');
            return $path;
        }
        return $specialty;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $especialty=Specialty::find($id);
        $especialty->name=$request->get('name');
        $especialty->save();
        return $especialty;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $especiaty = Specialty::findOrFail($id);
            return $especiaty->delete();
        }catch (\Illuminate\Database\QueryException $e){
            //tu código
            return 0;
        }
    }
    public function specialtyUpdate(Request $request, $id){
        $especialty=Specialty::find($id);
        $especialty->name=$request->get('name');
        $especialty->descripcion=$request->get('descripcion');
        $especialty->color=$request->get('color');
        $especialty->estado=$request->get('estado');
        $especialty->save();
        if($request->hasFile('file')){
            $path = $request->file->storeAs('specialities', $especialty->id.'.jpg');
            return $path;
        }
        return $especialty;
    }
}
