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
            "name"=>$request->get("name")
        ]);
        $specialty->save();
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
}
