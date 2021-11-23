<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'bookName'=>'required|string',
            'release_num'=>'required|numeric',
            'release_year'=>'required|date',
            'bookPublisher'=>'required|min:1',
            'bookCategory'=>'required|min:1',
            'bookAuthor'=>'required|min:1'
        ];
    }
    public function messages(){
        return[
            'bookName.required'=>'هذا الحقل مطلوب *',
            'bookName.string'=>'هذا الحقل يجب ان يحتوي على نص فقط *',
            'release_num.required'=>'هذا الحقل مطلوب *',
            'release_num.numeric'=>'هذا الحقل يجب ان يحتوي على رقم فقط *',
            'release_year.required'=>'هذا الحقل مطلوب *',
            'bookPublisher.required'=>'هذا الحقل مطلوب *',
            'bookAuthor.required'=>'هذا الحقل مطلوب *',
            'bookCategory.required'=>'هذا الحقل مطلوب *',
        ];
}
}
