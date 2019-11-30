<?php

namespace Unicorn\Author\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5',
            'phone'=>'required|min:4',
            'name'=>'required|min:7|unique:users,email',
        ];
    }
    public function messages()
    {
        return[
            'email.required'=>'Email không được để trống',
            'email.email'=>'email không đúng định dạng',
            'email.unique'=>'email đã tồn tại',
            'password.required'=>'Password không được để trống',
            'password.min'=>'Password không được nhỏ hơn 5 ký tự',
            'phone.required'=>'Phone không được để trống',
            'phone.min'=>'Phone không được nhỏ hơn 4 ký tự',
            'name.required'=>'name không được để trống',
            'name.min'=>'name không được nhỏ hơn 7 ký tự',
            'name.unique'=>'name không đúng định dạng'
        ];
    }
}
