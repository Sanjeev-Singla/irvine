<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
    public static function add_unit_rules()
    {
        return [
            'unit_type'     =>  'required',
            'address'       =>  'required',
            'unit_number'   =>  'required|numeric',
            'bedroom'       =>  'required|numeric',
            'bathroom'      =>  'required|numeric',
            'ac'            =>  'required|numeric',
            'heating'       =>  'required|numeric',
            'washer_dryer'  =>  'required|numeric',
            'appliances'    =>  'required',
            'square_footage'=>  'required|numeric',
            'year_built'    =>  'required|numeric',
            'year_remodeled'=>  'required|numeric',
            'upload_image'  =>  'required|image',
            'rent'          =>  'required|numeric'
        ];
    }
}
