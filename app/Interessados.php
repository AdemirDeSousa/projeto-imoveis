<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interessados extends Model
{
    protected $fillable = [
        'nome',
        'email'
    ];

    public function imoveis(){

        return $this->belongsToMany(Imoveis::class, 'interesses');
    }
}
