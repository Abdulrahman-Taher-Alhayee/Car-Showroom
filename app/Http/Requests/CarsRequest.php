<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarsRequest  extends FormRequest
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
            'company_id'=>'required',
            'model'=>'required',
            'year'=>'required',
            'colors'=>'required',


        ];
    }

    public function messages()
    {
        return[
            'company_id.required'=>'الرجاء إدخال إسم الشركة',
            'model.required'=>'الرجاء موديل السيارة',
            'year.required'=>'الرجاء سنة الصنع',
            'colors.required'=>'الرجاء لون السيارة',
    
        ];
    }
}
