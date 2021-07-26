<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
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
        return  [
            'name_sei' => 'required' ,
            // 'name_mei'  => 'required' ,
            // 'name_sei_kana' => ['required', 'regex:/^([ァ-ン]|ー)+$/'] ,
            // 'name_mei_kana'  => ['required', 'regex:/^([ァ-ン]|ー)+$/'],
            // 'birthday_y' => 'required',
            // 'birthday_m' => 'required',
            // 'birthday_d' => 'required',
            // 'tel1' => 'required|numeric',
            // 'tel2' => 'required|numeric',
            // 'tel3' => 'required|numeric',
            // 'email' => 'required|email',
            // 'zip1' => 'required|numeric',
            // 'zip2' => 'required|numeric',
            // 'adr1' => 'required',
            // 'adr2' => 'required',
            // 'adr3' => 'required',
        ];
    }
}