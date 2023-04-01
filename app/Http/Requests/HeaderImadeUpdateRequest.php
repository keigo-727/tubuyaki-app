<?php

namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HeaderImageUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'header_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'header_image.required' => 'ヘッダー画像を選択してください。',
            'header_image.image' => 'ヘッダー画像は画像ファイルを選択してください。',
            'header_image.mimes' => 'ヘッダー画像はjpeg、png、jpg形式の画像を選択してください。',
            'header_image.max' => 'ヘッダー画像は2MB以下のファイルを選択してください。',
        ];
    }
}
