<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => ['required', 'max:100'],
            'lead' => ['required', 'max:250'],
            'published_date' => ['required'],
            'published_date' => ['required', 'date'],
            'published_time' => ['required', 'date_format:H:i'],
            'expires_date' => ['nullable', 'date'],
            'expires_time' => ['nullable', 'date_format:H:i'],
        ];
    }
}
