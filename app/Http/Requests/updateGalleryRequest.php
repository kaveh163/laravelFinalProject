<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateGalleryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "image"=>"max:5000|mimes:jpg,jpeg,png"
        ];
    }
    public function messages()
    {
        return [

            "image.max"=>"نباید بیشتر از 5 مگابایت باشد",
            "image.mimes"=>"باید فرمت jpg، jpeg، png باشد"
        ];
    }
}
