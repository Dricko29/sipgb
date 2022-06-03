<?php

namespace App\Http\Requests\AKP\Agama;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgamaRequest extends FormRequest
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
            'nama' => ['required','unique:agama,nama']
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama tidak boleh kosong !!!',
            'nama.unique' => 'agama sudah ada !!!',
        ];
    }
}