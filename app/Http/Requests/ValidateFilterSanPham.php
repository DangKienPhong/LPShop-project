<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFilterSanPham extends FormRequest
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
            'TenSanPham' => [
                'string',
                // 'exists:san_phams,TenSanPham',
            ],
            'nha_cung_cap_id' => [
                // 'required',
                'min:1'
            ],
            'danh_muc_con_id' => [
                // 'required',
                'min:1'
            ],
            // 'NgayRaMat' => [
            //     'required',
            // ],
            // 'TinhTrang' => [
            //     'required',
            // ],

            // 'HoTroBluetooth' => [
            //     'required',
            // ],

            // 'ThietBiBaoGom' => [
            //     'required',
            // ],
            // 'DonGia' => [
            //     'numeric',
            // ],
        ];

        return $rules;
    }
}
