<?php

namespace App\Models;

use App\Models\Jogos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Times extends Model
{
    use HasFactory;

    public function jogos1(){
        return $this->hasMany(Jogos::class,'time1','id');
    }
    public function jogos2(){
        return $this->hasMany(Jogos::class,'time2','id');
    }
}
