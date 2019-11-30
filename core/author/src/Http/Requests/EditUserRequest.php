<?php

namespace Unicorn\Author\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'email'=>'required|email|',
            'phone'=>'required|min:4',
            'name'=>'required|min:7|unique:users,email',
        ];
    }
    public function messages()
    {
        return[
            'email.required'=>'Email không được để trống',
            'email.email'=>'email không đúng định dạng',
            'phone.required'=>'Phone không được để trống',
            'phone.min'=>'Phone không được nhỏ hơn 4 ký tự',
            'name.required'=>'name không được để trống',
            'name.min'=>'name không được nhỏ hơn 7 ký tự',
            'name.unique'=>'name không đúng định dạng'
        ];
    }
}
