<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLikeRequest extends FormRequest
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
                'userId' => ['required'],
                'commentId' => ['required'],
            ];
        } else {
            return [
                'userId' => ['sometimes', 'required'],
                'commentId' => ['sometimes', 'required'],
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
        if ($this->commentId) {
            $this->merge([
                'comment_id' => $this->commentId
            ]);
        }
    }
}
