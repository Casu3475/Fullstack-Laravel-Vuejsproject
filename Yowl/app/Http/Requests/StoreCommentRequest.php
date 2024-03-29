<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'title' => ['required'],
            'content' => ['required'],
            'url' => ['required', 'url'],
            // 'likes' => ['required'],
            // 'reports' => ['required'],
            // 'userId' => ['required'],
            'categoryId' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            // 'user_id' => $this->userId,
            'category_id' => $this->categoryId
        ]);
    }
}
