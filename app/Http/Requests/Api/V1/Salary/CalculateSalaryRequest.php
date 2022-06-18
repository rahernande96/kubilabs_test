<?php

namespace App\Http\Requests\Api\V1\Salary;

use Illuminate\Foundation\Http\FormRequest;

class CalculateSalaryRequest extends FormRequest
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
            "base_salary"=>["required","numeric", "min:0"],
            "worked_days"=>["required","integer", "min:1", "max:30"], 
            "sales_value"=>["required","integer", "min:0"]
        ];
    }
}
