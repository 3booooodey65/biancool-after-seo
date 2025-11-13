<?php
// app/Http/Requests/ServiceRequestRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ServiceRequest;

class ServiceRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // السماح لجميع المستخدمين بإنشاء طلبات خدمة
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'phone_number' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^(50|53|54|55|56|57|58|59)\d{7}$/', $value)) {
                        $fail('يرجى إدخال رقم جوال صحيح.');
                    }
                },
            ],
            'address' => 'required|string|max:500',
            'problem_description' => 'required|string|max:2000',
            'device_type' => 'required|in:' . implode(',', array_keys(ServiceRequest::DEVICE_TYPES)),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
    }

    /**
     * Customize the error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'full_name.required' => 'يرجى إدخال الاسم الكامل.',
            'full_name.string'   => 'يجب أن يكون الاسم نصاً.',
            'full_name.max'      => 'الاسم لا يمكن أن يتجاوز 255 حرفاً.',

            'phone_number.required' => 'يرجى إدخال رقم الجوال.',
            'phone_number.string'   => 'رقم الجوال غير صالح.',

            'address.required' => 'يرجى إدخال العنوان.',
            'address.string'   => 'العنوان غير صالح.',
            'address.max'      => 'العنوان لا يمكن أن يتجاوز 500 حرف.',

            'problem_description.required' => 'يرجى وصف المشكلة.',
            'problem_description.string'   => 'وصف المشكلة غير صالح.',
            'problem_description.max'      => 'وصف المشكلة لا يمكن أن يتجاوز 2000 حرف.',

            'device_type.required' => 'يرجى اختيار نوع الجهاز.',
            'device_type.in'       => 'نوع الجهاز المختار غير صالح.',

            'image.image' => 'الملف المرفوع يجب أن يكون صورة.',
            'image.mimes' => 'الصورة يجب أن تكون بصيغة jpeg، png، jpg، أو gif.',
            'image.max'   => 'حجم الصورة لا يمكن أن يتجاوز 5 ميغابايت.',
        ];
    }
}
