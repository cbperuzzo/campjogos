<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\jogos;
use App\Models\Times;
use App\Models\Campeonatos;
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
    {   $camp = campeonatos::count();
        $times = times::count();
        $ajogos = jogos::where('dataHora','>',\carbon\carbon::now('GMT-3'))->count();
        return view('home',array('camp'=>$camp,'times'=>$times,'ajogos'=>$ajogos));
    }
}
