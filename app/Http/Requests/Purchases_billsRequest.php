<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Purchases_billsRequest extends FormRequest
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
            'supplier_id'=>'required',
            'bill_type'=>'required',
            'date'=>'required'
        ];
    }

    public function messages()
    {
        return[
            'supplier_id.required'=>'الرجاء إدخال إسم المورد',
            'bill_type.required'=>'الرجاء إدخال نوع الفاتورة',
            'date.required'=>'الرجاء إدخال تاريخ الفاتورة'
        ];
    }
}
