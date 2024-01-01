<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'userEmail' => 'required|email',
            'userName' => 'required',
            'userPhoneNumber' => 'required|numeric|min:8',
            'userAddress' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'userEmail.email' => 'Định Dạng Email Không Hợp Lệ!',
            'userPhoneNumber.numeric' => 'Số Điện Thoại Là Chữ Số!',
            'userPhoneNumber.min' => 'Số Điện Thoại Phải Lớn Hơn 8 Chữ!',
        ];
    }
}
