<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createContactRequest extends FormRequest
{




    public function rules()
    {
        return [
            "fullname"=>"max:100|min:10",
            "email"=>"email|max:100",
            "comment"=>"max:500"

        ];
    }
    public function messages(){
        return [
            "fullname.max"=>"بیشترین مقدار نام و نام خانوادگی 100 کاراکتور می باشد",
            "fullname.min"=>"کمترین مقدار نام و نام خانوادگی 10 کاراکتور می باشد",
            "email.email"=>"فرمت ایمیل وارد کنید",
            "email.max"=> "بیشترین مقدار ایمیل 100 کاراکتور می باشد",
            "comment.max"=>"بیشترین مقدار کامنت 500 کاراکتر می باشد"
        ];
    }
}
