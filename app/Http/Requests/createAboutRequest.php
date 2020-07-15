<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createAboutRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "font"=> "required|max:40",
            "color"=>"required",
            "about"=>"required|between:10,1500"
        ];
    }
    public function messages()
    {
        return[
            "font.required"=>"مقدار فونت الزامی می باشد",
            "font.max"=> "مقدار بیشتر از 40 پیکسل نباشد",
            "color.required"=> "مقدار رنگ الزامی می باشد",
            "about.required"=>"مقدار درباره ما الزامی می باشد",
            "about.between"=>"مقدار about بین 10 تا 500 کاراکتور می باشد"
        ];
    }
}
