<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'slug' => ['required'],
            'description' => ['required'],
            'cover_path' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
