<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name'         => 'required|string|max:255',
            'phone_number' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^(50|53|54|55|56|057|58|59)\d{7}$/', $value)) {
                        $fail('يرجى إدخال رقم جوال صحيح.');
                    }
                },
            ],
            'message'      => 'required|string',
        ];
    }

    /**
     * Customize the error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required'         => 'يرجى إدخال الاسم.',
            'name.string'           => 'يجب أن يكون الاسم نصاً.',
            'name.max'              => 'الاسم لا يمكن أن يتجاوز 255 حرفاً.',

            'phone_number.required' => 'يرجى إدخال رقم الجوال.',
            'phone_number.string'   => 'رقم الجوال غير صالح.',

            'email.required'        => 'يرجى إدخال البريد الإلكتروني.',
            'email.email'           => 'يرجى إدخال بريد إلكتروني صالح.',
            'email.max'             => 'البريد الإلكتروني لا يمكن أن يتجاوز 255 حرفاً.',

            'message.required'      => 'يرجى إدخال الرسالة.',
            'message.string'        => 'الرسالة غير صالحة.',
            'message.min'           => 'يجب أن تكون الرسالة على الأقل 10 أحرف.',
        ];
    }
}
