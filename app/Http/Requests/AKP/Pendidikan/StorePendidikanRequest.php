<?php

namespace App\Http\Requests\AKP\Pendidikan;

use Illuminate\Foundation\Http\FormRequest;

class StorePendidikanRequest extends FormRequest
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
            'nama' => ['required', 'unique:pendidikan,nama']
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama tidak boleh kosong !!!',
            'nama.unique' => 'pendidikan sudah ada !!!',
        ];
    }
}