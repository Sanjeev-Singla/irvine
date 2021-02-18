<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
    public static function rules()
    {
        return [
            'first_name'        =>  'required|array',
            'first_name.*'      =>  'required|string|min:3|max:100',
            'last_name.*'       =>  'nullable|alpha',
            'dob.*'             =>  'required|date',
            'phone.*'           =>  'required|numeric|max:999999999999999',
            'ssn.*'             =>  'required|max:255',   
            'valid_id.*'        =>  'required|image',  
            'breed.*'           =>  'required|max:100',
            'weight.*'          =>  'required|numeric|max:4294967295',
            'current_address'   =>  'required|max:255',
            'property_manager'  =>  'required|max:100',
            'current_city'      =>  'required|max:255',
            'current_state'     =>  'required|max:255',
            'current_zip'       =>  'required|max:20',
            'property_manager'  =>  'required|max:100',
            'manager_phone'     =>  'required',
            'current_residence_length'=>'required|numeric',
            'move_in_date'      =>  'required|date',
            'lease_length'      =>  'required|numeric',
            'current_employer'  =>  'required|max:255',
            'started_date'      =>  'required|date',
            'employer_address'  =>  'required|max:255',
            'employer_city'     =>  'required|max:100',
            'employer_state'    =>  'required|max:100',
            'employer_zip'      =>  'required|max:20',
            'supervisor_email'  =>  'required|email',
            'supervisor_phone'  =>  'required|numeric',
            'supervisor_email'  =>  'required|email',
            'gross_income'      =>  'required|numeric',
            'reference_name.*'   =>  'required|max:100',
            'reference_phone.*'  =>  'required|max:100',
            'emergency_phone.*'  =>  'required|numeric',
            'emergency_name.*'   =>  'required|max:100',
            'relationship.*'     =>  'required|max:30',
            'car_no_parking_required'=>'required|numeric',
            'auth_signature'    =>  'required'
        ];
    }
}
