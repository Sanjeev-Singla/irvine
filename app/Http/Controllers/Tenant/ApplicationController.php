<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ApplicationRequest;

class ApplicationController extends Controller
{    
    /**
     * tenantApplication
     *
     * @param  mixed $request
     * @param  mixed $email
     * @return void
     */
    public function tenantApplication(Request $request,$email){
        $referenceDetails = \App\Models\ReferTenant::where('tenant_email',$email)->first();

        if (blank($referenceDetails)) {
            abort(401,'Not authorized');
        }
        if (!blank($referenceDetails->applications)) {
            return '<h1>Application submitted successfully please wait for owner response</h1>';
        }

        $unitDetails =  \App\Models\Unit::find($referenceDetails->units_id);
        $applicationChk = \App\Models\Application::where(['email'=>$email,'application_status'=>\Config::get('constant.application.pending')])->first();

        if(!blank($applicationChk)){
            return view('tenant.application',compact('unitDetails','referenceDetails'))->with('error','Application already submitted');
        }

        if ($request->isMethod('post')) {
            $request->validate(ApplicationRequest::rules());

            $inputApplication['email']          = $email;
            $inputApplication['refer_tenant_id']= $referenceDetails->id;
            $inputApplication['auth_signature'] = $request->auth_signature;
            $application = \App\Models\Application::create($inputApplication);

            for ($i=0; $i < count($request->first_name); $i++) { 
                $inputTenant['application_id']  =   $application->id;
                $inputTenant['first_name']      =   $request->first_name[$i];
                $inputTenant['last_name']       =   !blank($request->last_name[$i])?$request->last_name[$i]:'';
                $inputTenant['dob']             =   $request->dob[$i];
                $inputTenant['phone']           =   $request->phone[$i];
                $inputTenant['ssn']             =   $request->ssn[$i];
                $inputTenant['created_at'] = $inputTenant['updated_at'] = date('Y-m-d H:i:s');

                $inputTenant['valid_id'] = time().$i.'.'.$request->valid_id[$i]->extension();
                $request->valid_id[$i]->move(public_path('uploads/images/valid_id'), $inputTenant['valid_id']);

                \DB::table('application_tenants')->insert($inputTenant);
            }

            for ($i=0; $i < count($request->breed); $i++) { 
                $inputPet['application_id']  =   $application->id;
                $inputPet['breed']           =   $request->breed[$i];
                $inputPet['weight']          =   $request->weight[$i];

                \DB::table('pets')->insert($inputPet);
            }

            $inputRenterHistory['application_id']                  =   $application->id;
            $inputRenterHistory['current_address']                 =   $request->current_address;
            $inputRenterHistory['property_manager']                =   $request->property_manager;
            $inputRenterHistory['city']                            =   $request->current_city;
            $inputRenterHistory['state']                           =   $request->current_state;
            $inputRenterHistory['zip']                             =   $request->current_zip;
            $inputRenterHistory['manager_phone']                   =   $request->manager_phone;
            $inputRenterHistory['current_residence_length']        =   $request->current_residence_length;
            $inputRenterHistory['late_payment_notice_status']      =   $request->late_payment_notice_status;
            $inputRenterHistory['late_payment_notice_description'] =   $request->late_payment_notice_description;
            $inputRenterHistory['smoking_status']                  =   $request->smoking_status;
            $inputRenterHistory['move_in_date']                    =   $request->move_in_date;
            $inputRenterHistory['lease_length']                    =   $request->lease_length;
            $inputRenterHistory['reason_to_move']                  =   $request->reason_to_move;

            \DB::table('renter_history')->insert($inputRenterHistory);

            $inputEmployement['application_id']     =   $application->id;
            $inputEmployement['current_employer']   =   $request->current_employer;
            $inputEmployement['employer_address']   =   $request->employer_address;
            $inputEmployement['started_date']       =   $request->started_date;
            $inputEmployement['city']               =   $request->employer_city;
            $inputEmployement['state']              =   $request->employer_state;
            $inputEmployement['zip']                =   $request->employer_zip;
            $inputEmployement['supervisor_name']    =   $request->supervisor_name;
            $inputEmployement['supervisor_phone']   =   $request->supervisor_phone;
            $inputEmployement['supervisor_email']   =   $request->supervisor_email;
            $inputEmployement['gross_income']       =   $request->gross_income;
            $inputEmployement['extra_income']       =   $request->extra_income;

            \DB::table('employement_history')->insert($inputEmployement);

            for ($i=0; $i < count($request->reference_name); $i++) { 
                $inputReference['application_id']     =   $application->id;
                $inputReference['name']     =   $request->reference_name[$i];
                $inputReference['phone']    =   $request->reference_phone[$i];

                \DB::table('references')->insert($inputReference);
            }

            for ($i=0; $i < count($request->emergency_name); $i++) { 
                $inputEmergency['application_id']               =   $application->id;
                $inputEmergency['name']         =   $request->emergency_name[$i];
                $inputEmergency['phone']        =   $request->emergency_phone[$i];
                $inputEmergency['relationship'] =   $request->relationship[$i];

                \DB::table('emergency_contacts')->insert($inputEmergency);
            }

            $inputVehicle['application_id']          =   $application->id;
            $inputVehicle['car_no_parking_required'] =   $request->car_no_parking_required;
            $inputVehicle['color']                   =   $request->color;
            $inputVehicle['make']                    =   $request->make;
            $inputVehicle['year']                    =   $request->year;
            $inputVehicle['model']                   =   $request->model;
            $inputVehicle['dln']                     =   $request->dln;
            $inputVehicle['licence_plate_number']    =   $request->licence_plate_number;

            \DB::table('vehicle_info')->insert($inputVehicle);

            return redirect()->back()->with('success','Application submitted');

        }
        

        return view('tenant.application',compact('unitDetails','referenceDetails'));
    }
}
