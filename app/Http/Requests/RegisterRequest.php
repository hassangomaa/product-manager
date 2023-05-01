<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ],

        ];

        $domain = explode('@', $this->email)[1];
        if ($domain === 'gmail.com') {
            $rules['email'] = 'required|string|email|max:255|regex:/^[^@]+@(?!gmail\.com)\w+\.\w+$/i|unique:users,email';
        } else {
            $rules['email'] = [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->where(function ($query) use ($domain) {
                    return $query->where('email', 'REGEXP', '^[^@]+@'.$domain.'$');
                }),
            ];
        }

        return $rules;
    }


}
