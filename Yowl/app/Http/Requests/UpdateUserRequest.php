<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
                'name' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required', Rules\Password::defaults()],
                'dateOfBirth' => ['required'],
                'isAdmin' => ['required']
            ];
        } else {
            return [
                'name' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required', 'email'],
                'password' => ['sometimes', 'required', Rules\Password::defaults()],
                'dateOfBirth' => ['sometimes', 'required'],
                'isAdmin' => ['sometimes', 'required']
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->isAdmin) {
            $this->merge([
                'is_admin' => $this->isAdmin,
            ]);
        }
        if ($this->dateOfBirth) {
            $this->merge([
                'date_of_birth' => $this->dateOfBirth
            ]);
        }
    }
}
