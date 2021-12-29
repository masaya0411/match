<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:10|unique:users,name,'.$this->id.',id',
            'introduction' => 'max:5000',
            'pic' => 'file|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'ニックネームを入力して下さい。',
            'name.max' => '10文字以内で入力して下さい。',
            'name.unique' => 'そのニックネームは使用できません。別の名前を入力して下さい。',
            'introduction.max' => '自己紹介は5000文字以内で入力して下さい。'
        ];
    }
}
