<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        'name' => 'required|string|max:255|unique:products',
        'price' => 'required|numeric|min:0',
        'le_price' => 'required|numeric|min:0',
        
        'sale_price' => 'required|numeric|lt:price',
        'category_id' => 'required|integer|exists:categories,id',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp'
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'Nhập Tên sản phẩm.',
            'name.unique'=>"$this->name đã tồn tại",
            'price.required' => 'Điền giá sỉ.',
            'sale_price.required' => 'Điền giá nhập.',
            'sale_price.lt' => 'Giá nhập phải nhỏ hơn giá sỉ.',
            'le_price.required' => 'Điền giá bán lẻ.',
            'category_id.required' => 'Chọn Danh mục.',
            'photo.required' => 'Chọn 1 Ảnh.',
            'photo.image' => 'Ảnh sản phẩm phải là định dạng hình ảnh.',
            'photos.*.image' => 'Ảnh phụ phải là định dạng hình ảnh.'        
        ];
    }
    
}
