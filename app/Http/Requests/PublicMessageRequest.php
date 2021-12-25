<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicMessageRequest extends FormRequest
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
            'public_msg' => 'required|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'public_msg.required' => 'メッセージを入力して下さい。',
            'public_msg.max' => '500文字以内で入力して下さい。',
        ];
    }
}
