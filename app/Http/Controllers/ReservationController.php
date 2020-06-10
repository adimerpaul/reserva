<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Reservation;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reservation::select('reservations.id',DB::raw("CONCAT ('Doc: ',doctors.name,'\nEsp. ',specialtys.name) as title"),'start','end','color')
            ->join('doctors','doctor_id','=','doctors.id')
            ->join('specialtys','specialty_id','=','specialtys.id')
            ->get();
//        return Reservation::all(['start','id']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation= new Reservation([
            'start'=>date($request->get('start')),
            'end'=>date($request->get('end')),
            'doctor_id'=>$request->get('doctor_id'),
            'specialty_id'=>$request->get('specialty_id'),
        ]);
        $reservation->save();
//        return $reservation;
        return $reservation;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
