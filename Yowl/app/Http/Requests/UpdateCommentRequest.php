<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'title' => ['required'],
                'content' => ['required'],
                'url' => ['required'],
                // 'likes' => ['required'],
                // 'reports' => ['required'],
                'userId' => ['required'],
                'categoryId' => ['required'],
            ];
        } else {
            return [
                'title' => ['sometimes', 'required'],
                'content' => ['sometimes', 'required'],
                'url' => ['sometimes', 'required'],
                // 'likes' => ['required'],
                // 'reports' => ['required'],
                'userId' => ['sometimes', 'required'],
                'categoryId' => ['sometimes', 'required'],
            ];
        }
    }
    protected function prepareForValidation()
    {
        if ($this->userId) {
            $this->merge([
                'user_id' => $this->userId,
            ]);
        }
        if ($this->categoryId) {
            $this->merge([
                'category_id' => $this->categoryId
            ]);
        }
    }
}
