<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Doctor::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $doctor=new Doctor([
            'name'=>$request->get('name')
        ]);
        $doctor->save();
        if($request->hasFile('file')){
//            $image = $request->file('file');
//            $img = Image::make($image->getRealPath());
//            $img->resize(100, 100, function ($constraint) {
//                $constraint->aspectRatio();
//            })->save('/aaaaaa.jpg');
//            $path = $request->img->storeAs('doctors', $doctor->id.'xxxxxxxxxxxx.jpg');
            $path = $request->file->storeAs('doctors', $doctor->id.'.jpg');
            return $path;
        }
        return $doctor;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $doctor=Doctor::find($id);
        $doctor->name=$request->get('name');
        $doctor->save();
        return $request;
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
            $doctor= Doctor::findOrFail($id);
            return $doctor->delete();
        }catch (\Illuminate\Database\QueryException $e){
            //tu código
            return 0;
        }

//        try {
//            $doctor= Doctor::find($id);
//            $doctor->delete();
//            return "si";
//        }catch (Exception $exception){
//            return "no";
//        }
//        $doctor= Doctor::findOrFail($id);
//        return $doctor->delete();
//        $result=$doctor->delete();
//        if ($doctor){
//            return "delete";
//        }else{
//            return "not";
//        }

    }
    public function subir(Request $request){
        if($request->hasFile('file')){
            $path = $request->file->storeAs('images', date('Ymdhis').'.jpg');
            return $path;
        }
        return "No! It's not a File";
    }
    public function actphoto(Request $request){
        if($request->hasFile('file')){
//            $path = $request->file->storeAs('images', date('Ymdhis').'.jpg');
            $path=$request->file->storeAs('doctors',$request->get('id').'.jpg');
            return $path;
        }
        return "No! It's not a File";
    }
}
