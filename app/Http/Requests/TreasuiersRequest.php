<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreasuiersRequest extends FormRequest
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
            'is_master'=>'required',
            'last_isal_exchange'=>'required|integer|min:0',
            'last_isal_collect'=>'required|integer|min:0',
            'active'=>'required',

        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'الرجاء إدخال إسم الخزنة',
            'is_master.required'=>'الرجاء إدخال نوع الخزنة',
            'active.required'=>'الرجاء إدخال حالة الخزنة',
            'last_isal_exchange.required'=>'الرجاء إدخال رقم ايصال الصرف ',
            'last_isal_exchange.integer'=>'الرجاء إدخال رقم صحيح',
            'last_isal_collect.required'=>'الرجاء إدخال رقم ايصال التحصيل ',
            'last_isal_collect.integer'=>'الرجاء إدخال رقم صحيح'
        ];
    }
}
