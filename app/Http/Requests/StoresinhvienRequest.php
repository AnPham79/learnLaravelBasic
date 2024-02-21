<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\trangthaisinhvienEnum;
use Illuminate\Validation\Rule;
use App\Models\Course;

class StoresinhvienRequest extends FormRequest
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
            'tensinhvien' => ['required', 'string', 'min:2', 'max:50'],
            'gioitinh' => ['required', 'boolean'],
            'ngaysinh' => ['required', 'date', 'before:today'],
            'trangthai' => [
                'required',
                Rule::in(array_keys(trangthaisinhvienEnum::asArray()))
            ],
            'FK_ma_khoahoc' => [
                'required',
                Rule::exists(Course::class, 'id')
            ]
        ];
    }

    public function messages()
    {
        return [
            'tensinhvien.required' => 'Vui lòng nhập tên sinh viên.',
            'tensinhvien.string' => 'Tên sinh viên phải là chuỗi.',
            'tensinhvien.min' => 'Tên sinh viên phải có ít nhất :min ký tự.',
            'tensinhvien.max' => 'Tên sinh viên không được vượt quá :max ký tự.',
            'ngaysinh.required' => 'Vui lòng chọn ngày sinh.',
            'ngaysinh.date' => 'Ngày sinh không hợp lệ.',
            'ngaysinh.before' => 'Ngày sinh phải trước ngày hôm nay.',
            'trangthai.in' => 'Trạng thái không hợp lệ',
            'FK_ma_khoahoc.exists' => 'Khóa học không tồn tại'
        ];
    }
}
