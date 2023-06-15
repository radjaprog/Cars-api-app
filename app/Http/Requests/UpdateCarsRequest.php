<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarsRequest extends FormRequest
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
            'brand' => 'required|min:2',
            'model' => 'required|min:2',
            'year' => 'required',
            'is_automatic' => 'required|boolean',
            'engine' => 'required',
            'number_of_doors' => 'required|numeric|between:2,5',
            'max_speed' => 'numeric|between: 20,300'
        ];
    }
}
