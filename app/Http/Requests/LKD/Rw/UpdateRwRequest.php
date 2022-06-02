<?php

namespace App\Http\Requests\LKD\Rw;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRwRequest extends FormRequest
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
            'nama' => ['required', Rule::unique('rw')->ignore($this->rw)],
            'nama_krw' => 'required',
            'nik_krw' => ['required','size:16', Rule::unique('rw')->ignore($this->rw)],
            'jk_id' => 'required',
            'dusun_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama rw harus diisi !!!',
            'nama.unique' => 'nama rw sudah ada !!!',
            'nama_krw.required' => 'nama rw harus diisi !!!',
            'nik_krw.required' => 'nik rw harus diisi !!!',
            'nik_krw.unique' => 'nik rw sudah ada !!!',
            'jk_id.required' => 'jenis kelamin harus diisi !!!',
            'dusun_id.required' => 'dusun harus diisi !!!',
        ];
    }
}