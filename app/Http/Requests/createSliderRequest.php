<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createSliderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "image"=> "required|max:5000|mimes:jpg,jpeg,png",
            "alt"=> "required|between:5,100",
            "caption"=>"required|between:5,500"
        ];
    }

    public function messages()
    {
        return [
            "image.required"=>"مقدار عکس الزامی می باشد",
            "image.max"=>"مقدار عکس نباید از 5 مگابایت بیشتر باشد",
            "image.mimes"=>"فرمت عکس باید jpg,jpeg یا png باشد",
            "alt.required"=>"مقدار اسم عکس الزامی می باشد",
            "alt.between"=>"مقدار نام عکس باید بین 5 تا 100 کاراکتور باشد",
            "caption.required"=>"مقدار زیرنویس الزامی می باشد",
            "caption.between"=>"مقدار زیرنویس باید بین 5 تا 500 کاراکتور باشد"

        ];
    }
}
