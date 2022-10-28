<?php

namespace App\Http\Controllers;

use App\Models\campeonatos;
use Illuminate\Http\Request;

class CampeonatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $camp = Campeonatos::all();
        return view('campeonatos.index',array('camp'=>$camp,'busca'=>null));
    }

    public function buscar(Request $request){
        $camp = Campeonatos::where('nome','LIKE','%'.$request->input('busca').'%')
        ->orWhere('local','LIKE','%'.$request->input('busca').'%')->get();
        return view('campeonatos.index',array('camp'=>$camp,'busca'=>$request->input('busca')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campeonatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $camp = new campeonatos;
        $camp->nome = $request->input('nome');
        $camp->local = $request->input('local');
        if($camp->save()){
            return redirect('/campeonatos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\campeonatos  $campeonatos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camp = campeonatos::find($id);
        return view('campeonatos.show',array('camp'=>$camp));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\campeonatos  $campeonatos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camp = campeonatos::find($id);
        return view('campeonatos.edit',array('camp'=>$camp));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\campeonatos  $campeonatos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $camp = campeonatos::find($id);
        $camp->nome = $request->input('nome');
        $camp->local = $request->input('local');
        if($camp->save()){
            return redirect('/campeonatos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\campeonatos  $campeonatos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camp = campeonatos::find($id);
        $camp->delete();
        return redirect(url('/campeonatos'));
    }
}
