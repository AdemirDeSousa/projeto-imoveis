<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImoveisRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'codigo' => 'required',
            'tipo' => 'required',
            'pretensão' => 'required',
            'titulo' => 'required',
            'detalhes' => 'required',
            'quartos' => 'required',
            'preco' => 'required'
        ];
    }
}
