<?php

namespace App\Http\Requests\LKD\Dusun;

use Illuminate\Foundation\Http\FormRequest;

class StoreDusunRequest extends FormRequest
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
            'nama' => 'required|unique:dusun,nama',
            'nama_kadus' => 'required',
            'nik_kadus' => 'required|size:16|unique:dusun,nik_kadus',
            'jk_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama dusun harus diisi !!!',
            'nama.unique' => 'nama dusun sudah ada !!!',
            'nama_kadus.required' => 'nama kadus harus diisi !!!',
            'nik_kadus.required' => 'nik kadus harus diisi !!!',
            'nik_kadus.unique' => 'nik kadus sudah ada !!!',
            'jk_id.required' => 'jenis kelamin harus diisi !!!',
        ];
    }
}