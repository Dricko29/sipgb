<?php

namespace App\Http\Requests\AKP\Bahasa;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBahasaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => ['required', Rule::unique('bahasa')->ignore($this->bahasa)],
            'inisial' => ['required', Rule::unique('bahasa')->ignore($this->bahasa)]
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama tidak boleh kosong !!!',
            'nama.unique' => 'bahasa sudah ada !!!',
            'inisial.required' => 'inisial tidak boleh kosong !!!',
            'inisial.unique' => 'inisial sudah ada !!!',
        ];
    }
}