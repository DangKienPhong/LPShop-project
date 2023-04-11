<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateDanhMuc extends FormRequest
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
            'TenDanhMuc' => [
                'required',
            ]

        ];

        if ($this->getMethod() == "POST") {
            $rules += [
                'TenDanhMucCon' => [
                    'required',
                    'unique:danh_mucs,TenDanhMucCon',
                ]
            ];
        } elseif ($this->getMethod() == "PUT") {
            $rules += [
                'TenDanhMucCon' => [
                    'required',
                    'unique:danh_mucs,TenDanhMucCon,' . $this->route('id') ?? 0,
                ]
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'TenDanhMuc.required' => 'Hãy điền tên danh mục bạn muốn tạo !',
            'TenDanhMucCon.required' => 'Hãy điền tên danh mục con bạn muốn tạo !',
            'TenDanhMucCon.unique' => 'Tên danh mục con đã tồn tại !',


            // 'body.required' => 'A message is required',
        ];
    }
}
