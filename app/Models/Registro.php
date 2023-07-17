<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'entrada',
        'salida',
    ];

    public function user(){

        return $this->belongsTo(User::class, 'id_user');
    }

}

