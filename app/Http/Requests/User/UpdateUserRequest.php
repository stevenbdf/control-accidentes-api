<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['sometimes', 'string', 'max:255', "unique:users,username,{$this->user->id}"],
            'role' => ['sometimes', 'string', Rule::in(['user', 'admin'])],
            'password' => ['sometimes', 'string', 'max:255', 'confirmed'],
        ];
    }
}
