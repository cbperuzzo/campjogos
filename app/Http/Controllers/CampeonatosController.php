<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        if(Auth::check() && Auth::user()->isAdmin()){
            return view('campeonatos.create');
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate($request,[
            'nome' => 'required',
            'local' => 'required'
        ]);

        if(Auth::check() && Auth::user()->isAdmin()){
            $camp = new campeonatos;
            $camp->nome = $request->input('nome');
            $camp->local = $request->input('local');
            if($camp->save()){
                return redirect('/campeonatos');
            }
        }
        else{
            return redirect('login');
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
        if(Auth::check() && Auth::user()->isAdmin()){
            $camp = campeonatos::find($id);
            return view('campeonatos.edit',array('camp'=>$camp));
        }
        else{
            return redirect('login');
        }
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
        $this->validate($request,[
            'nome' => 'required',
            'local' => 'required',
        ]);
        
        if(Auth::check() && Auth::user()->isAdmin()){
            $camp = campeonatos::find($id);
            $camp->nome = $request->input('nome');
            $camp->local = $request->input('local');
            if($camp->save()){
                return redirect('/campeonatos');
            }
        }
        else{
            return redirect('login');
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
        if(Auth::check() && Auth::user()->isAdmin()){
            $camp = campeonatos::find($id);
            $camp->delete();
            return redirect(url('/campeonatos'));
            
        }
        else{
            return redirect('login');
        }
    }
}
