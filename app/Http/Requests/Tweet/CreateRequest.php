<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // ユーザー情報を識別してこのリクエストができるか判定する。
    // true なら誰でも可
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    
    public function rules()
    {
        return [
            'tweet' => 'required|max:140'
        ];
    }
    public function userid():int
    {
        return $this->user()->id;
    }

    public function tweet():string
    {
        return $this ->input('tweet');
    }
}
