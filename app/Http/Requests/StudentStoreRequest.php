<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:255',
            'number'=>'required|regex:/^01[0-2,5]\d{8}$/|unique:students,number',
            'PersonalCode'=>'required|int|unique:students,PersonalCode',
            'password'=>'required|confirmed|min:8',
            'gender'=>'required|in:m,f',
            'verified'=>'required|in:0,1',
            'status'=>'required|in:0,1',
            'NationalID'=>'required|integer|min:15|unique:students,NationalID'
        ];
    }
}
