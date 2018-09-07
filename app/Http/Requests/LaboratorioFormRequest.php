<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboratorioFormRequest extends FormRequest
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
         return ['nome'  => 'required|min:5|max:100' ];
     }


     public function messages()
     {
       return [
         'nome.required' => 'O campo nome é de preenchimento obrigatório',
         'nome.min' =>'O campo nome precisa ter no mínimo  5 caracteres',
         'nome.max' => 'O campo nome precisa ter no máximo  100 caracteres'
       ];
     }
}
