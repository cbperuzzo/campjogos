<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\campeonatos;
use App\Models\Times;
use App\Models\Jogos;
use Illuminate\Http\Request;

class JogosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jogos = Jogos::all();
        return view('jogos.index',array('jogos'=>$jogos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $camps = campeonatos::all();
        $times = times::all();
        return view('jogos.create',array('times'=>$times,'camps'=>$camps));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'camp' => 'required',
            'time1' => 'required',
            'time2' => 'required',
            'mddapx' => 'required',
            'data' => 'required',
            'hora' => 'required'
        ]);

        if(Auth::check() && Auth::user()->isAdmin()){
            $jogo = new jogos;
            $jogo->camp = $request->input('camp');
            $jogo->time1 = $request->input('time1');
            $jogo->time2 = $request->input('time2');
            $jogo->t2pontos = 0;
            $jogo->t1pontos= 0;
            $jogo->mddapx= $request->input('mddapx');
            $jogo->dataHora= $request->input('data').' '.$request->input('hora').':00';
            if($jogo->save()){
                return redirect('/jogos');  
            }
        }
        else{
            return redirect('login');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jogos  $jogos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jogo = jogos::find($id);
        return view('jogos.show',array('jogo'=>$jogo));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jogos  $jogos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if(Auth::check() && Auth::user()->isAdmin()){
            $jogo = jogos::find($id);
            return view('jogos.edit',array('jogo'=>$jogo));
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jogos  $jogos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            't1pontos'=>'required',
            't2pontos'=>'required'
        ]);
        
        if(Auth::check() && Auth::user()->isAdmin()){
            $jogo=jogos::find($id);
            $jogo->t1pontos = $request->input("t1pontos");
            $jogo->t2pontos = $request->input("t2pontos");
            if($jogo->save()){
                return redirect('/jogos');
            }
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jogos  $jogos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check() && Auth::user()->isAdmin()){
            $jogo = jogos::find($id);
            $jogo->delete();
            return redirect(url('/jogos'));
        }
        else{
            return redirect('login');
        }
    }
}
