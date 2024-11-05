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
            'category_id' => 'required|string', 
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_path' => 'required|string|max:255|regex:/\.(jpg|jpeg|png)$/i',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'カテゴリーは必須です。',
            'title.required' => 'タイトルは必須です。',
            'title.max' => 'タイトルは255文字以内で入力してください。',
            'content.required' => 'ブログ本文は必須です。',
            'image_path.required' => '画像は必須です。',
            'image_path.max' => '画像の名前は20文字以内で登録してください。',
            'image_path.regex:/\.(jpg|jpeg|png)$/i' => '画像の拡張子が違います。拡張子はjpg, jpeg, pngのいずれかに設定ください。',
        ];
    }
}
