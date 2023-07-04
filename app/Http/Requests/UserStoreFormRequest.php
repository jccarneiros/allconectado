<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserStoreFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:users',
            //            'password' => 'nullable',
            //            'password' => 'required', 'confirmed',
            //            'password' => ['required', 'confirmed', Password::min(8)->letters()
            //                ->mixedCase()
            //                ->numbers()
            //                ->symbols()
            //                ->uncompromised()],
            //            'image' => 'nullable',
            //            'type' => 'nullable',
        ];
    }
}
