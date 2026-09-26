<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class addproductsRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'unique:products,description'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }
    #[Override]
    public function messages()
    {
        return [
            'name.required' => 'Tên món ăn là bắt buộc.',
            'category_id.exists' => 'Danh mục này không tồn tại trong hệ thống.',
            'description.unique' => 'Mô tả không được trùng.',
            'price.required' => 'Giá tiền là bắt buộc.',
        ];
    }
}
