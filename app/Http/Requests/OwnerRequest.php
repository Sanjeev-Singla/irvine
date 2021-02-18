<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
     * @return array
     */
    public static function owner_register()
    {
        return [
            'first_name'        => 'required|alpha|min:3',
            'last_name'         => 'required|alpha',
            'email'             => 'required|email|unique:users,email',
            'phone'             => 'required',
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
            'income'            => 'required|numeric',
            'bank_statement'    => 'required|mimes:jpg,png,jpeg|max:2048'
        ];
    }

    public static function owner_update_profile()
    {
        return [
            'first_name'        => 'required|alpha|min:3',
            'last_name'         => 'nullable|alpha',
            'phone'             => 'required|numeric|max:9999999999',
            'current_password'  => 'nullable|min:3',
            'password'          => 'nullable|min:6|different:current_password',
            'confirm_password'  => 'nullable|same:password',
            'income'            => 'required|numeric',
            'bank_statement'    => 'nullable|mimes:jpg,png,jpeg|max:2048'
        ];
    }
}
