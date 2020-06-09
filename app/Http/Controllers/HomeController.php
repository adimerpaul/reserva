<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function reservae()
    {
        return view('home');
    }
    public function reservam()
    {
        return view('home');
    }
    public function reserva()
    {
        return view('home');
    }
    public function doctor()
    {
        return view('home');
    }
    public function especialidad()
    {
        return view('home');
    }

}
