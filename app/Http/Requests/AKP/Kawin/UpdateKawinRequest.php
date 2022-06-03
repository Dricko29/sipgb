<?php

namespace App\Http\Requests\AKP\Kawin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateKawinRequest extends FormRequest
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
            'nama' => ['required', Rule::unique('kawin')->ignore($this->kawin)]
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama tidak boleh kosong !!!',
            'nama.unique' => 'kawin sudah ada !!!',
        ];
    }
}