<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'authors' => ['required'],
            'available_at' => ['nullable'],
            'subtitle' => ['required'],
            'categor_id' => ['required', 'integer'],
            'file_path' => ['required'],
            'cover_path' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
