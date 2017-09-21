<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactCreateRequest extends FormRequest
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
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'email' => 'required|max:255|email',
            'address' => 'required|max:100',
            'phone' => 'required|numeric',
            'category_id' => 'required',
            'group_id' => 'required',
            'file' => 'mimes:jpeg,png',
            'emails.*'=>'required',
            'phones.*'=>'required|numeric',
            'category_ids.*'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'fname.required' => 'نام باید وارد شود',
            'fname.max' => 'نام حداکثر باید 100 کاراکتر باشد!',
            'lname.required' => 'نام خانوادگی باید وارد شود',
            'lname.max' => 'نام خانوادگی حداکثر باید 100 کاراکتر باشد!',
            'email.required' => 'ایمیل باید وارد شود',
            'email.max' => 'ایمیل حداکثر باید 255 کاراکتر باشد!',
            'email.email' => 'ایمیل باید در قالب یک ایمیل معتبر باشد!',
            'address.required' => 'آدرس باید وارد شود',
            'address.max' => 'آدرس حداکثر باید 100 کاراکتر باشد!',
            'phone.required' => 'شماره تماس باید وارد شود',
            'phone.max' => 'شماره تماس حداکثر باید 11 کاراکتر باشد!',
            'phone.numeric' => 'شماره تماس  باید عدد شود',
            'file.mimes' => ' باید فرمت تصویر png یا jpg انتخاب شود',
            'group_id.required' => ' گروه مخاطب باید انتخاب شود',
            'emails.*.required'=>'باید ایمیل وارد شود یا فیلد را حذف کنید!',
            'phones.*.required'=>'باید شماره تماس اضافی وارد شود یا فیلد را حذف شود!',
            'category_ids.*.required'=>'باید دسته شماره تماس اضافی را وارد شود یا فیلد را حذف شود!',
            'category_id.required'=>'باید دسته شماره تماس راانخاب شود!',


        ];
    }
}
