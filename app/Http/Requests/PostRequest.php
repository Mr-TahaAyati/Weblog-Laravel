<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:2|max:255|string',
            'summery' => 'required|min:25|max:255|string',
            'body' => 'required|min:25|string',
            'user_id' => 'required|numeric|exists:users,id',
            'status' => 'required|in:1,0',
            'cat_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',

        ];
    }
}
