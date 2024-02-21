<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'tensinhvien' => [
                'bail', // thông báo lỗi luôn chú k cần kiểm tra ở dưới nữa
                'required',
                'string',
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Bắt buộc phải điền'
        ];
    }

    // họ sinh viên, ngày sinh .... thì thêm vào là đc
}
