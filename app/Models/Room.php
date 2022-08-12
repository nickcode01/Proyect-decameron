<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function hotels(){
        return $this->belongsTo(Hotel::class,'id');
    }

    public function accommodations(){
        return $this->hasMany(Accommodation::class,'id');
    }
    public function trooms(){
        return $this->hasMany(Troom::class,'id');
    }

}
