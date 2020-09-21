<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 

class ClientRequest extends FormRequest
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
            'id_number' => ['required', 'max:15', Rule::unique('clients', 'id_number')->ignore($this->id)],
            'first_name' => 'required|max:150',
            'surname' => 'required|max:150',
            'nickname' => 'required|max:150',
            'date' => 'required',
            'email' => 'required|max:150',
            'cellphone' => 'required',
            'address' => 'required|max:150'
        ];
    }
}
