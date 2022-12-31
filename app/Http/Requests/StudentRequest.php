<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'secondname' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'class_id' => 'required',
            'phonenumber' => 'required',
            'Address' => 'required'
        ];
    }
    public function errors()
    {
        return $this->validator->errors();
    }

    
}
