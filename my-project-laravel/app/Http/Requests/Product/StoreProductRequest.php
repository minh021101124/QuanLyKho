<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
        'name' => 'required|string|max:255|unique:products',
        'price' => 'required|numeric|min:0',
        'slug' => 'required|string|max:255|unique:products',
        'sale_price' => 'nullable|numeric|lt:price',
        'category_id' => 'required|integer|exists:categories,id',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp'
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'slug.required' => 'Tên đường dẫn là bắt buộc.',
            'name.unique'=>"$this->name đã tồn tại",
            'slug.unique'=>"$this->slug đã tồn tại",
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá gốc.',
            'category_id.required' => 'Danh mục là bắt buộc.',
            'photo.required' => 'Ảnh sản phẩm là bắt buộc.',
            'photo.image' => 'Ảnh sản phẩm phải là định dạng hình ảnh.',
            'photos.*.image' => 'Ảnh phụ phải là định dạng hình ảnh.'        
        ];
    }
}
