<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateNhaCungCap extends FormRequest
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
            'SoDienThoai' => [
                'required',
                'min:10',
                'max:11',

            ]

        ];

        if ($this->getMethod() == "POST") {
            $rules += [
                'TenNhaCungCap' => [
                    'required',
                    'unique:nha_cung_caps,TenNhaCungCap',
                ],
                'Email' => [
                    'required',
                    'email',
                    'unique:nha_cung_caps,Email',
                ],
            ];
        }

        if ($this->getMethod() == "PUT") {
            $rules += [
                'TenNhaCungCap' => [
                    'required',
                    'unique:nha_cung_caps,TenNhaCungCap,' . $this->route('id') ?? 0,
                ],
                'Email' => [
                    'required',
                    'email',
                    'unique:nha_cung_caps,Email,' . $this->route('id') ?? 0,
                ],
            ];
        }

        return $rules;
    }
}
