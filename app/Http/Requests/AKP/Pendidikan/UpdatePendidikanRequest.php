<?php

namespace App\Http\Requests\AKP\Pendidikan;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePendidikanRequest extends FormRequest
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
            'nama' => ['required', Rule::unique('pendidikan')->ignore($this->pendidikan)]
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