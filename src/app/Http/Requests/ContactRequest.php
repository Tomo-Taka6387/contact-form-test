<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel1' => ['required', 'regex:/^\d{1,5}$/'],
            'tel2' => ['required', 'regex:/^\d{1,5}$/'],
            'tel3' => ['required', 'regex:/^\d{1,5}$/'],
            'gender' => ['required', 'in:1,2,3'],
            'address' => ['required', 'string', 'max:255'],
            'building' => ['nullable', 'string', 'max:255'],
            'detail' => ['required', 'string', 'max:120'],
            'category_id'  => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'tel1.required' => '電話番号を入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel3.required' => '電話番号を入力してください',

            'tel1.regex' => '電話番号は5桁までの数字で入力してください',
            'tel2.regex' => '電話番号は5桁までの数字で入力してください',
            'tel3.regex' => '電話番号は5桁までの数字で入力してください',
        ];
    }
}
