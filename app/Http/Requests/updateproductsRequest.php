<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class updateproductsRequest extends FormRequest
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
        $id = $this->route('id') ?? $this->route('product');
        return [
            'name' => ['required', 'max:15', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['required', 'string', 'unique:products,description,' . $id],
            'price' => ['required', 'numeric', 'min:0'],
        ];
    }
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
