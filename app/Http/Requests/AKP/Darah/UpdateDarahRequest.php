<?php

namespace App\Http\Requests\AKP\Darah;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDarahRequest extends FormRequest
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
            'nama' => ['required', Rule::unique('golongan_darah')->ignore($this->darah)]
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama tidak boleh kosong !!!',
            'nama.unique' => 'darah sudah ada !!!',
        ];
    }
}