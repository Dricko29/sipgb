<?php

namespace App\Http\Requests\LKD\Rt;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRtRequest extends FormRequest
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
            'nama' => ['required', Rule::unique('rt')->ignore($this->rt)],
            'nama_krt' => 'required',
            'nik_krt' => ['required', 'size:16', Rule::unique('rt')->ignore($this->rt)],
            'jk_id' => 'required',
            'rw_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama rt harus diisi !!!',
            'nama.unique' => 'nama rt sudah ada !!!',
            'nama_krt.required' => 'nama rt harus diisi !!!',
            'nik_krt.required' => 'nik rt harus diisi !!!',
            'nik_krt.unique' => 'nik rt sudah ada !!!',
            'jk_id.required' => 'jenis kelamin harus diisi !!!',
            'rw_id.required' => 'rw harus diisi !!!',
        ];
    }
}