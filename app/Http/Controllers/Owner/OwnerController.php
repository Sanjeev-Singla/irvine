<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use App\Http\Requests\TenantRequest;

class OwnerController extends Controller
{    
    /**
     * register
     *
     * @param  mixed $request
     * @return void
     */
    public function register(Request $request){
        if($request->isMethod('post')){
            # validate
            $request->validate(OwnerRequest::owner_register());
            
            $inputs = $request->all();
            if($request->hasFile('bank_statement')){
                $inputs['bank_statement'] = time().'.'.$request->bank_statement->extension();
                $request->bank_statement->move(public_path('uploads/images/bank_statement'), $inputs['bank_statement']);
            }
            $inputs['is_owner'] = \Config::get('constant.owners.true');
            $inputs['password'] = \Hash::make($inputs['password']);
            $result = \App\Models\User::create($inputs);
            if ($result) {
                return redirect()->route('login')->with('success','Registed Successfully.');
            }
            return back()->with('error','oops! Please try again.');
        }
        return view('owners.register');
    }
    
    /**
     * profile
     *
     * @return void
     */
    public function profile(){
        $userDetails = \App\Models\User::find(\Auth::user()->id); 
        return view('owners.profile',compact('userDetails'));
    }
    
    /**
     * owner updateProfile
     *
     * @return void
     */
    public function updateProfile(Request $request){
        $user = \App\Models\User::find(\Auth::user()->id); 
        if($request->isMethod('post')){
            # validate
            $request->validate(OwnerRequest::owner_update_profile());
            $inputs = $request->all();

            if (!blank($inputs['password'])) {
                if (\Hash::check($request->password, $user->password)) {
                    return back()->with('error','Current password & new password must be different.');
                }else{
                    $inputs['password'] = \Hash::make($inputs['password']);
                }
            }else{
                $inputs['password'] = $user->password;
            }

            if($request->hasFile('bank_statement')){
                \File::delete(public_path('uploads/images/bank_statement').'/'.$user->bank_statement);

                $inputs['bank_statement'] = time().'.'.$request->bank_statement->extension();
                $request->bank_statement->move(public_path('uploads/images/bank_statement'), $inputs['bank_statement']);
            }

            $result = $user->update($inputs);
            if ($result) {
                return redirect()->route('owner-profile')->with('success','Profile update succefully.');
            }
            return back()->with('error','oops! Please try again.');
        }
        return view('owners.editProfile',compact('user'));
    }
    
    /**
     * referTenant
     *
     * refer tenant to fill application form with email
     * @param  mixed $request
     * @return void
     */
    public function referTenant(Request $request){
        # checking user already refered for a unit
        $referChk = \App\Models\ReferTenant::where(['tenant_email'=>$request->tenant_email,'units_id'=>$request->units_id])->first();
        if(!blank($referChk)){
            return back()->with('error','Already refered for this unit.');
        }

        $inputs = $request->all();
        $inputs['owner_id'] = \Auth::user()->id;

        # Url to fill application form
        $inputs['confirm'] = route('tenant-application',$request->tenant_email);

        # DB entry
        $result = \App\Models\ReferTenant::create($inputs);
        
        if ($result) {
            \Mail::to($inputs['tenant_email'])->send(new \App\Mail\ReferTenantMail($inputs));
            return 'Refered Successfully.';
        }
        return 'oops! Please try again.';
    }
    
    /**
     * to confirm application by tenant
     *
     * @param  mixed $id
     * @return void
     */
    public function confirmApplication($id){
        # getting application details
        $application = \App\Models\Application::find($id);
        $application->application_status = \Config::get('constant.application.confirm');
        $result = $application->save();

        if ($result) {
            #\Mail::to($application->email)->send(new \App\Mail\ConfirmApplicationMail($inputs));
            return back()->with('success','Application confirmed Successfully.');
        }
        return back()->with('error','oops! Please try again.');
    }
    
    /**
     * to decline application by tenant
     *
     * @param  mixed $id
     * @return void
     */
    public function declineApplication($id){
        # getting application details
        $application = \App\Models\Application::find($id);
        $application->application_status = \Config::get('constant.application.decline');
        $result = $application->save();
        if ($result) {
            #\Mail::to($application->email)->send(new \App\Mail\DeclineApplicationMail());
            return back()->with('success','Application declined Successfully.');
        }
        return back()->with('error','oops! Please try again.');
    }
    
    /**
     * editApplication
     *
     * @param  mixed $id
     * @return void
     */
    public function editApplication($id){
        $application['applications'] = \DB::table('applications')->where('id',$id)->first();

        if (blank($application)) {
            return back()->with('Invalid application id.');
        }

        $application['applications_background_check'] = \DB::table('applications_background_check')->where('applications_id',$id)->first();
        $application['applications_credit_history'] = \DB::table('applications_credit_history')->where('applications_id',$id)->first();
        $application['applications_emergency'] = \DB::table('applications_emergency_info')->where('applications_id',$id)->first();
        $application['applications_employement_history'] = \DB::table('applications_employement_history')->where('applications_id',$id)->first();
        $application['applications_occupant_18_plus'] = \DB::table('applications_occupant_18_plus')->where('applications_id',$id)->first();
        $application['applications_occupant_under_18'] = \DB::table('applications_occupant_under_18')->where('applications_id',$id)->first();
        $application['application_pets'] = \DB::table('applications_pets')->where('applications_id',$id)->first();
        $application['applications_renter_history'] = \DB::table('applications_renter_history')->where('applications_id',$id)->first();
        $application['applications_vehicle_info'] = \DB::table('applications_vehicle_info')->where('applications_id',$id)->first();

        return view('owners.application.edit',compact('application'));
    }

    
    /**
     * updateApplication
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updateApplication(Request $request,$id){
        $applicationDetails = \DB::table('applications')->where('id',$id)->first();

        if (blank($applicationDetails)) {
            return back()->with('Invalid application id.');
        }

        $application['full_name']               = $request->full_name;
        $application['dob']                     = $request->dob;
        $application['social_security_number']  = $request->social_security_number;
        $application['phone']                   = $request->phone;
        $application['email']                   = $request->email;
        $application['car_no_parking_required'] = $request->car_no_parking_required;

        \DB::table('applications')->where('id',$id)->update($application);

        $occupant18Plus['occupant_full_name']               = $request->occupant_full_name;
        $occupant18Plus['occupant_dob']                     = $request->occupant_dob;
        $occupant18Plus['occupant_social_security_number']  = $request->occupant_social_security_number;
        $occupant18Plus['occupant_phone']                   = $request->occupant_phone;
        $occupant18Plus['occupant_email']                   = $request->occupant_email;

        \DB::table('applications_occupant_18_plus')->where('applications_id',$id)->update($occupant18Plus);

        $occupantUnder18['full_name_1']     = $request->full_name_1;
        $occupantUnder18['relationship_1']  = $request->relationship_1;
        $occupantUnder18['full_name_2']     = $request->full_name_2;
        $occupantUnder18['relationship_2']  = $request->relationship_2;
        $occupantUnder18['full_name_3']     = $request->full_name_3;
        $occupantUnder18['relationship_3']  = $request->relationship_3;

        \DB::table('applications_occupant_under_18')->where('applications_id',$id)->update($occupantUnder18);

        $pets['type']               =   $request->type;
        $pets['breed']              =   $request->breed;
        $pets['size']               =   $request->size;
        $pets['weight']             =   $request->weight;

        \DB::table('applications_pets')->where('applications_id',$id)->update($pets);

        $renterHistroy['street_address']   =   $request->street_address;
        $renterHistroy['city']             =   $request->city;
        $renterHistroy['state']            =   $request->state;
        $renterHistroy['zip_code']         =   $request->zip_code;
        $renterHistroy['property_owner_name']   =   $request->property_owner_name;
        $renterHistroy['property_owner_phone']  =   $request->property_owner_phone;
        $renterHistroy['current_residence_length']         =   $request->current_residence_length;
        $renterHistroy['late_payment_notice_description']  =   $request->late_payment_notice_description;
        $renterHistroy['evicated_description']             =   $request->evicated_description;
        $renterHistroy['felony_convicted_description']     =   $request->felony_convicted_description;

        \DB::table('applications_renter_history')->where('applications_id',$id)->update($renterHistroy);

        $backgroungCheck['smoke_status']            =   $request->smoke_status;
        $backgroungCheck['looking_to_move_date']    =   $request->looking_to_move_date;
        $backgroungCheck['reason_to_move']          =   $request->reason_to_move;
        $backgroungCheck['lease_length_looking_for']=   $request->lease_length_looking_for;

        \DB::table('applications_background_check')->where('applications_id',$id)->update($backgroungCheck);

        $employementHistory['employer_address']         =   $request->employer_address;
        $employementHistory['employement_length']       =   $request->employement_length;
        $employementHistory['supervisor_name']          =   $request->supervisor_name;
        $employementHistory['supervisor_phone']         =   $request->supervisor_phone;
        $employementHistory['supervisor_email']         =   $request->supervisor_email;
        $employementHistory['gross_income']             =   $request->gross_income;
        $employementHistory['additional_income_source'] =   $request->additional_income_source;

        \DB::table('applications_employement_history')->where('applications_id',$id)->update($employementHistory);

        $creditHistory['bankruptcy_description']   =   $request->bankruptcy_description;
        $creditHistory['is_someone_pay_loan']      =   $request->is_someone_pay_loan;
        $creditHistory['person_name']              =   $request->person_name;
        $creditHistory['person_phone']             =   $request->person_phone;
        $creditHistory['person_email']             =   $request->person_email;
        $creditHistory['current_loan']             =   $request->current_loan;
        $creditHistory['loan_amount']              =   $request->loan_amount;

        \DB::table('applications_credit_history')->where('applications_id',$id)->update($creditHistory);

        $emergencyInfo['name_1']                =   $request->name_1;
        $emergencyInfo['phone_1']               =   $request->phone_1;
        $emergencyInfo['name_2']                =   $request->name_2;
        $emergencyInfo['phone_2']               =   $request->phone_2;
        $emergencyInfo['name_3']                =   $request->name_3;
        $emergencyInfo['phone_3']               =   $request->phone_3;
        $emergencyInfo['emergency_person_name'] =   $request->emergency_person_name;
        $emergencyInfo['emergency_phone']       =   $request->emergency_phone;

        \DB::table('applications_emergency_info')->where('applications_id',$id)->update($emergencyInfo);

        $vehicleInfo['make']                =   $request->make;
        $vehicleInfo['model']               =   $request->model;
        $vehicleInfo['color']               =   $request->color;
        $vehicleInfo['year']                =   $request->year;
        $vehicleInfo['licence_number']      =   $request->licence_number;
        $vehicleInfo['licence_plate_number']=   $request->licence_plate_number;

        \DB::table('applications_vehicle_info')->where('applications_id',$id)->update($vehicleInfo);

        return redirect('owner/home')->with('success','Application updated Successfully.');
    }
    
    /**
     * updateMaintenance
     *
     * @param  mixed $request
     * @return void
     */
    public function updateMaintenance(Request $request){
        $request->validate(TenantRequest::maintenance_request());

        $inputs = $request->all();
        $inputs['available_time']  = implode(',',$inputs['available_time']);
        unset($inputs['_token']);
        $result = \App\Models\MaintenanceRequest::where('id',$inputs['id'])->update($inputs);
        if ($result) {
            return back()->with('success','Request updated Successfully.');
        }
        return back()->with('error','oops! Try again.');
    }
}
