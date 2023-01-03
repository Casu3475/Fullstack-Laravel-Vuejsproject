<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResponseRequest extends FormRequest
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
            'content' => ['required'],
            // 'userId' => ['required'],
            'commentId' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            // 'user_id' => $this->userId,
            'comment_id' => $this->commentId
        ]);
    }
}
 