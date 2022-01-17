<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// 案件登録バリデーション
class ProductRequest extends FormRequest
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
            'title' => 'required|string|max:30',
            'category_id' => 'required|integer',
            'min_price' => 'integer|min:0|max:100000',
            'max_price' => 'integer|min:0|max:100000|gt:min_price',
            'reward' => 'string|max:50',
            'description' => 'required|string|max:5000',
            'recruit_flg' => 'integer'
        ];
    }
}
