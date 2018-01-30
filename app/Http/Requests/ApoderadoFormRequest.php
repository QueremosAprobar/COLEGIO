<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApoderadoFormRequest extends FormRequest
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
            //
            'dni'=>'required|size:8|regex:/^[0-9]+$/|unique',
            'nombre'=>['required','max:100','min:3','regex:/^[A-Z ]+$/'],
            'apellido'=>['required','max:100','min:3','regex:/^[A-Z ]+$/'],
            'direccion'=>['required','max:100'],
            'telefono'=>['required','size:9','regex:/^[0-9]+$/'],
        ];
    }
}
