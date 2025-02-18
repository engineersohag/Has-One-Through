<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;

    public function Companis(){
        return $this->hasOne(Companis::class);
    }
    public function phoneNumber(){
        return $this->hasOneThrough(phone_number::class, Companis::class);
    }
}
