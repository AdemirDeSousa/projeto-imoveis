<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imoveis extends Model
{
    protected $fillable = [
        'codigo',
        'tipo',
        'pretensão',
        'titulo',
        'detalhes',
        'quartos',
        'preco'
    ];

    public function interessados(){

        return $this->belongsToMany(Interessados::class, 'interesses');
    }
}
