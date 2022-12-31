<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'age' => 'required|numeric',
            'gender' => 'required',
            'subject_id' => 'required',
            'class_id' => 'required|exists:classes,id',
            'phonenumber' => 'required|numeric',
            'Address' => 'required'

        ];
    }
    public function errors()
    {
        return $this->validator->errors();
    }
}
