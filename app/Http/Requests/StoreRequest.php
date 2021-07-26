<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * パスワード設定画面用リクエスト
 */
class StoreRequest extends FormRequest
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
    {return [];
        return [
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'password.required'                 => 'パスワードを入力してください' ,
            'password_confirmation.required'    => 'パスワードを入力してください' ,
            'password.confirmed'                => 'パスワードが異なります' ,
            'password.min'                      => 'パスワードは最低6文字以上入力してください' ,
        ];
    }
}
