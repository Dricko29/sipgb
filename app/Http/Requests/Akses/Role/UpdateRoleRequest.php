<?php

namespace App\Http\Requests\Akses\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
            'name' => ['required', Rule::unique('roles')->ignore($this->role)]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nama role tidak boleh kosong',
            'name.unique' => 'role sudah ada'
        ];
    }
}