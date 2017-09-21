<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupCreateRequest extends FormRequest
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
            'name'=>'required|unique:groups'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'نام باید وارد شود',
            'name.unique' => 'نام باید منحصربفرد کاراکتر باشد!',


        ];
    }
}
