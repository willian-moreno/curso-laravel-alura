<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:255',
            'qtd_temporadas' => 'required|digits_between:1,50',
            'qtd_episodios' => 'required|digits_between:1,100',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo <b>:attribute</b> obrigatório',

            'nome.min' => 'O campo <b>:attribute</b> requer no mínimo de 3 caracteres',
            'nome.max' => 'O campo <b>:attribute</b> permite o máximo de 255 caracteres',

            'qtd_temporadas.digits_between' => 'O campo <b>:attribute</b> requer no mínimo 1 e no máximo 50 temporadas',

            'qtd_episodios.digits_between' => 'O campo <b>:attribute</b> requer no mínimo 1 e no máximo 100 episódios',
        ];
    }
}
