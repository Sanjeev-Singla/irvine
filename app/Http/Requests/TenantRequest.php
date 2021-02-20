<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
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
    public static function tenant_register()
    {
        return [
            'first_name'        => 'required|alpha|min:3',
            'last_name'         => 'nullable|alpha',
            'profile_image'     => 'required|image|mimes:jpg,png,jpeg|max:2048',
            //'valid_id'          => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'financials'        => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'email'             => 'required|email|unique:users,email|exists:application,email',
            'phone'             => 'required|max:9999999999',
            'dob'               => 'required|date',
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password'
        ];
    }

    public static function update_profile()
    {
        return [
            'first_name'        => 'required|alpha|min:3',
            'last_name'         => 'nullable|alpha',
            'profile_image'     => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'valid_id'          => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'financials'        => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'phone'             => 'required|max:9999999999',
            'dob'               => 'required|date',
            'current_password'  => 'nullable|min:3',
            'password'          => 'nullable|min:6|different:current_password',
            'confirm_password'  => 'nullable|same:password',
        ];
    }

    public static function maintenance_request(){
        return [
            'issue'             => 'required|max:50',
            'priority_level'    => 'required',
            'appartment_number' => 'required',
            'issue_start_date'  => 'required|date',
            'cause'             => 'nullable|max:100',
            'contact_number'    => 'required|numeric',
            'available_time'    => 'required'
        ];
    }
}
