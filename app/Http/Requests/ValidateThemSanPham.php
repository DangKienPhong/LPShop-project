<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateThemSanPham extends FormRequest
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
        return [
            'TenSanPham' => 'required|unique:san_phams,TenSanPham',
            'nha_cung_cap_id' => 'required | min:1',
            'danh_muc_id' => 'required ',
            'NgayRaMat' => 'required',
            'TinhTrang' => 'required',
            'SoLuongTrongKho' => 'required | min:1',
            'GPU' => 'required',
            'CPU' => 'required',
            'RAM' => 'required',
            'BoNhoTrong' => 'required',
            'ChucNangHoTro' => 'required',
            'HoTroBluetooth' => 'required',
            'CongKetNoi' => 'required',
            'CongRaAV' => 'required',
            'ThietBiBaoGom' => 'required',
            'DonGia' => 'required',
            'tenhinhanh' => 'required|mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'TenSanPham.required' => 'Tên sản phẩm không được để trống !',
            'TenSanPham.unique' => 'Tên sản phẩm đã tồn tại !',
            'nha_cung_cap_id.required' => 'Hãy chọn nhà cung cấp sản phẩm !',
            'danh_muc_id.required' => 'Hãy chọn danh mục mà sản phẩm thuộc về !',
            'NgayRaMat.required' => 'Hãy chọn ngày ra mắt của sản phẩm !',
            'TinhTrang.required' => 'Tình trạng của sản phẩm không được để trống !',
            'SoLuongTrongKho.required' => 'Số lượng trong kho không được để trống !',
            'SoLuongTrongKho.min' => 'Số lượng trong kho phải lớn hơn 1 !',
            'GPU.required' => 'Hãy ghi thông số GPU trong thiết bị !',
            'CPU.required' => 'Hãy ghi thông số CPU trong thiết bị !',
            'RAM.required' => 'Hãy ghi thông số RAM trong thiết bị !',
            'BoNhoTrong.required' => 'Hãy ghi thông số Bộ Nhớ Trong của thiết bị !',
            'ChucNangHoTro.required' => 'Hãy điền chức năng hỗ trợ của sản phẩm !',
            'HoTroBluetooth.required' => 'Hãy chọn 1 trong 2 mục Hỗ trợ Bluetooth !',
            'CongKetNoi.required' => 'Xin hãy điền cổng kết nối của thiết bị !',
            'CongRaAv.required' => 'Xin hãy điền cổng ra của thiết bị !',
            'ThietBiBaoGom.required' => 'Xin hãy chọn một mục trong mục Thiết Bị bao gồm !',
            'DonGia.required' => 'Sản phẩm cần phải có đơn giá !',
            'tenhinhanh.required' => 'Sản phẩm cần phải có hình ảnh đại diện !',
            'tenhinhanh.mimes' => 'Tệp được chọn phải tệp hình ảnh !',

            // 'body.required' => 'A message is required',
        ];
    }
}
