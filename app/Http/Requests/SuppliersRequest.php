<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliersRequest  extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'phone'=>'required|integer|min:0',
            'email'=>'required',
            'address'=>'required',

        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'الرجاء إدخال إسم المورد',
            'phone.required'=>'الرجاء إدخال رقم التلفون  ',
            'phone.integer'=>'الرجاء إدخال رقم صحيح',
            'email.required'=>'الرجاء إدخال الإيميل',
            'address.required'=>'الرجاء إدخال عنوان السكن',
        ];
    }
}
