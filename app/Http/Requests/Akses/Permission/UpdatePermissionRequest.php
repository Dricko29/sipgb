<?php

namespace App\Http\Requests\Akses\Permission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePermissionRequest extends FormRequest
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
            'name' => ['required', Rule::unique('permissions')->ignore($this->permission)]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nama permission tidak boleh kosong',
            'name.unique' => 'permission sudah ada'
        ];
    }
}