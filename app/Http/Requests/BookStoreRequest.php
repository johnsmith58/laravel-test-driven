<?php

namespace App\Http\Requests;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    use FailedValidation;
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
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'A Book',
            'author_id' => 'An Author',
        ];
    }
}
