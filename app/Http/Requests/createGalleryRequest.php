<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createGalleryRequest extends FormRequest
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


    public function rules()
    {
        return [
            "image"=>"required|max:5000|mimes:jpg,jpeg,png"
        ];
    }

    public function messages()
    {
        return [
            "image.required"=>"مقدار عکس الزامی می باشد",
            "image.max"=>"نباید بیشتر از 5 مگابایت باشد",
            "image.mimes"=>"باید فرمت jpg، jpeg، pngب باشد"
        ];
    }
}
