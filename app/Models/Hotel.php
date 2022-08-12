<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['name','nit','city','num_room','address'];

    public function rooms(){
        return $this->hasMany(Room::class,'id');
    }

    public function Trooms(){
        return $this->hasMany(Troom::class,'id');
    }
}
