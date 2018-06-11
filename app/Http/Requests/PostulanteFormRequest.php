<?php

namespace sistemaE\Http\Requests;

use sistemaE\Http\Requests\Request;

class PostulanteFormRequest extends Request
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
            'iddocente'=>'required',
            'ci'=>'required|numeric',
            'nombresapellidos'=>'required|max:100|regex:/^[A-z ]+$/i',
            'direccion'=>'max:50',
            'email'=>'max:50'
        ];
    }
}
