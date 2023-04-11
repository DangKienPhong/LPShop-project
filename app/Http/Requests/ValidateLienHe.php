<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateLienHe extends FormRequest
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

        $rules = [
            'TieuDe' => [
                'required',

            ],
            'TenNguoiGui' => [
                'required',

            ],
            'Email' => [
                'required',
                'email'
            ],
            'TenCongTy' => [
                'required',
            ],
            'NoiDung' => [
                'required',
            ],

        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'TieuDe.required' => 'Hãy điền Tiêu đề bạn muốn gửi cho trang web',
            'TenNguoiGui.required' => 'Hãy điền họ tên của bạn để trang web có thể liên hệ bạn',
            'Email.required' => 'Hãy điền email để trang web có thể liên lạc với bạn',
            'TenCongTy.required' => 'Hãy điền Tên công ty mà bạn đại diện',
            'NoiDung.required' => 'Hãy điền nội dung bạn muốn gửi cho trang web',

            // 'body.required' => 'A message is required',
        ];
    }
}
