<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailCreateRequest extends FormRequest
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
            //
            'email'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'ایمیل باید وارد شود',
            'email.unique' => 'نام باید منحصربفرد کاراکتر باشد!',


        ];
    }
}
