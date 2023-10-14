<?php
 
namespace Modules\DoctorsBlog\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class DoctorsBlogsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|max:255',
            ''
        ];
    }
}
 