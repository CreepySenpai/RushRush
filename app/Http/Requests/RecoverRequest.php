<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecoverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'email|exists:Users',
            'newPassword' => 'required|alphaNum|min:5'
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'Email Người Dùng Không Tồn Tại!',
        ];
    }
}
