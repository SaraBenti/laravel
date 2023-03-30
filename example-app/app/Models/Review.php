<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

public function user(){
    //definizione della relazione tra le due tabelle
    return $this->belongsTo(User::class);
    //se lo chiamo user_id laravel fa in automatico
    //se voglio cjiamarlo con un altro nome devo esplicitarlo

}

}
