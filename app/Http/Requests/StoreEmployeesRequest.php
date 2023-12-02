<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_nm' => 'required',
            'last_nm' => 'required',
            'email' => 'required|unique:employees|email:dns',
            'phone' => 'required|numeric|unique:employees',
            'company_id' => 'required'
        ];
    }
}
