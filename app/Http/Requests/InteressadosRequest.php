<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InteressadosRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required',
            'email' => 'required|email',
        ];
    }
}
