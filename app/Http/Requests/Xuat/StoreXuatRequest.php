<?php

namespace App\Http\Requests\Xuat;

use Illuminate\Foundation\Http\FormRequest;

class StoreXuatRequest extends FormRequest
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
            'ma_xuat' => 'required|string|max:255',
            'noi_dung_xuat' => 'nullable|string',
            'ghi_chu' => 'nullable|string',
            'product_id' => 'required|array',
            
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'price' => 'required|array',
            'price.*' => 'required|in:sale_price,le_price,price',
            'total_price' => 'required|array',
            'total_price.*' => 'required|numeric',
            'ngaysx' => 'required|array',
            'ngaysx.*' => 'required|date',
            'hansd' => 'required|array',
            'hansd.*' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'ma_xuat.required' => 'Mã hóa đơn không được trống.',
            'product_id.required' => 'Hãy chọn sản phẩm.',
            'quantity.required' => 'Chọn số lượng.',
            'price.required' => 'Chọn giá sản phẩm.',
            'ngaysx.required' => 'Chọn ngày sản xuất.',
            'hansd.required' => 'Chọn ngày hết hạn.',

        ];
    }

}
