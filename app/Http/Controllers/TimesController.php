<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Times;
use Illuminate\Http\Request;

class TimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Times::all();
        return view('times.index',array('busca'=>null,'times'=>$times));
    }

    public function buscar(Request $request){

        $times = Times::where('nome','LIKE','%'.$request->input('busca').'%')
        ->orWhere('nacao','LIKE','%'.$request->input('busca').'%')->get();;
        return view('times.index',array('busca'=>$request->input('busca'),'times'=>$times));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check() && Auth::user()->isAdmin()){
            return view('times.create');
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome'=>'required',
            'nacao'=>'required'
        ]);
        
        if(Auth::check() && Auth::user()->isAdmin()){
            $time = new Times;
            $time->nome = $request->input('nome');
            $time->nacao = $request->input('nacao');
            if($time->save()){
                if($request->hasFile('foto')){
                    $imagem = $request->file('foto');
                    $nomearq = md5($time->id) . '.' . $imagem->getClientOriginalExtension();
                    $request->file('foto')->move(public_path('.\img\times'),$nomearq);
                }
                return redirect('/times');
            }
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Times  $times
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $time = Times::find($id);
        return view('times.show',array('time'=>$time));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Times  $times
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check() && Auth::user()->isAdmin()){
            $time = Times::find($id);
            return view('times.edit',array('time'=>$time));
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Times  $times
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome'=>'required',
            'nacao'=>'required'
        ]);
        
        if(Auth::check() && Auth::user()->isAdmin()){
            $time = Times::find($id);
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearq = md5($time->id) . '.' . $imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\times'),$nomearq);
            }
            $time->nome = $request->input('nome');
            $time->nacao = $request->input('nacao');
            if($time->save()){
                return redirect('/times');
            }
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Times  $times
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Auth::check() && Auth::user()->isAdmin()){
            $time = Times::find($id);
            if(isset($request->foto)){
                unlink($request->foto);
            }
            $time->delete();
            return redirect(url('/times'));
            
        }
        else{
            return redirect('login');
        }
    }
}
