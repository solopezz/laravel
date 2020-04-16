<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'title' => 'required',
            'url' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        //Tambien pueden hacerse traducciones
        return [
            'title.required' => 'El titulo es requerido',
            'url.required'  => 'La url es requerido',
            'description.required'  => 'La description es requerida',
        ];
    }
}
