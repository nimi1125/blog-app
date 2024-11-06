<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'category_id' => 'required|numeric', 
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_path' => 'required|file|image|mimes:jpg,jpeg,png|max:1024',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'カテゴリーは必須です。',
            'category_id.numeric' => 'カテゴリーIDは数値で入力してください。',
            'title.required' => 'タイトルは必須です。',
            'title.max' => 'タイトルは255文字以内で入力してください。',
            'content.required' => 'ブログ本文は必須です。',
            'image_path.required' => '画像は必須です。',
            'image_path.image' => '指定されたファイルが画像形式ではありません。',
            'image_path.mimes' => '画像の拡張子が違います。拡張子はjpg、jpeg、pngのいずれかに設定してください。',
            'image_path.max' => '画像のサイズは1MB以下にしてください。',
        ];
    }
}
