<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunnoFormRequest extends FormRequest
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
            
            'dnialumno'=>['required','size:8','regex:/^[0-9]+$/','unique:alumnoS'],
            'contraseña'=>['required','max:30','min:6'],
//          'iddocente'=>['required','size:4','regex:/^[0-9A-Z]+$/'],
            'nombre'=>['required','max:100','min:3','regex:/^[A-Z Ñ]+$/'],
            'apellido'=>['required','max:100','min:3','regex:/^[A-Z Ñ]+$/'],
            'direccion'=>['required','max:100','min:3'],
            'telefono'=>['required','size:9','regex:/^[0-9]+$/'],
            'email'=>['required','max:50','email']
            
       ];
    }
}
