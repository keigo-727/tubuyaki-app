<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255',
            Rule::unique(User::class)->ignore($this->user()->id)],
            'profile' => ['string', 'max:255'],
            'user_icon' => ['required', 'image', 'max:2048'],
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
