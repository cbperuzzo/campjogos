<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Times;
use App\Models\Campeonatos;

class Jogos extends Model
{
    use HasFactory;

    public function campr(){
        return $this->belongsTo(Campeonatos::class,'camp','id');
    }

    public function time1r(){
        return $this->belongsTo(Times::class,'time1','id');
    }

    public function time2r(){
        return $this->belongsTo(Times::class,'time2','id');
    }

    public function getEstadoAttribute(){

        $now = \Carbon\Carbon::now('GMT-3');
        $ini = \Carbon\Carbon::create($this->dataHora,'GMT-3');
        $iniadd = \Carbon\Carbon::create($this->dataHora,'GMT-3')->addMinutes($this->mddapx);

        if($now->lt($ini)){ //antes do jogo

            $r = 'agendado';
        }
        elseif($now->lt($iniadd)){ //durante

            $r = 'em curso';
            
        }
        else{ //depois

            if($this->t1pontos!=0 && $this->t2pontos!=0){

                if($this->t1pontos>$this->t2pontos){

                    $r = 'vencedor: '.$this->time1r->nome;
                }
                else{ //não podem ocorrer empates nesta modalidade

                    $r = 'vencedor: '.$this->time2r->nome; 

                }
            }
            else{
                $r = 'finalizado';
            }

        }
        return $r;
        
    }

}
