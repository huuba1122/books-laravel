<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchAuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'search_author'=>'required'
        ];
    }
    public function messages(): array
    {
        return [
            'search_author.required' => 'Không được để trống'
        ];
    }
}
