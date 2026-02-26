<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:150|unique:books,title,' . $this->book->id,
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|string|max:100',
            //Để nullable vì chưa dùng đến
            'publisher' => 'nullable|string|max:100',
            'publication_year' => 'nullable|integer',

            'quantity' => 'required|integer',
            // 'available' => 'required|integer|lte:quantity',
            'status' => 'required|integer|in:1,2',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề sách không được để trống.',
            'title.string' => 'Tiêu đề sách phải là một chuỗi ký tự.',
            'title.max' => 'Tiêu đề sách không được vượt quá 150 ký tự.',
            'title.unique' => 'Sách đã tồn tại.',

            'author_id.required' => 'Tác giả không được để trống.',
            'author_id.exists' => 'Tác giả không tồn tại.',

            'category_id.required' => 'Thể loại không được để trống.',
            'category_id.exists' => 'Thể loại không tồn tại.',

            'image.string' => 'Đường dẫn hình ảnh phải là một chuỗi ký tự.',
            'image.max' => 'Đường dẫn hình ảnh không được vượt quá 100 ký tự.',

            'publisher.string' => 'Nhà xuất bản phải là một chuỗi ký tự.',
            'publisher.max' => 'Nhà xuất bản không được vượt quá 100 ký tự.',

            'publication_year.integer' => 'Năm xuất bản phải là một số nguyên.',

            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',

            // 'available.required' => 'Số lượng có sẵn không được để trống.',
            // 'available.integer' => 'Số lượng có sẵn phải là một số nguyên.',
            // 'available.lte' => 'Số lượng có sẵn không được lớn hơn số lượng.',

            'status.required' => 'Trạng thái không được để trống.',
            'status.integer' => 'Trạng thái phải là một số nguyên.',
            'status.in' => 'Trạng thái không hợp lệ.',
        ];
    }
}
