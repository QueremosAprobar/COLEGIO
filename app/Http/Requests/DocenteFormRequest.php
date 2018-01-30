<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteFormRequest extends FormRequest
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
            'dnidocente'=>['required','unique:docentes','size:8','regex:/^[0-9]+$/'],
            'contraseña'=>['required','max:30','min:6'],
//            'iddocente'=>['required','size:4','regex:/^[0-9A-Z]+$/'],
            'nombre'=>['required','max:100','min:3','regex:/^[A-Z ]+$/'],
            'apellido'=>['required','max:100','min:3','regex:/^[A-Z ]+$/'],
            'direccion'=>['required','max:100'],
            'telefono'=>['required','size:9','regex:/^[0-9]+$/'],
            'email'=>['required','max:50','email']
        ];
    }
}
