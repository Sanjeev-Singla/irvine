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
            $inputs['signup-link'] = route('register',$application->email);
            \Mail::to($application->email)->send(new \App\Mail\ConfirmApplicationMail($inputs));
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

        $application['application_tenant'] = \DB::table('application_tenants')->where('application_id',$id)->get();
        $application['pets'] = \DB::table('pets')->where('application_id',$id)->get();
        $application['renter_history'] = \DB::table('renter_history')->where('application_id',$id)->first();
        $application['employement_history'] = \DB::table('employement_history')->where('application_id',$id)->first();
        $application['references'] = \DB::table('references')->where('application_id',$id)->get();
        $application['emergency_contacts'] = \DB::table('emergency_contacts')->where('application_id',$id)->get();
        $application['vehicle_info'] = \DB::table('vehicle_info')->where('application_id',$id)->first();
        
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
        $applicationDetails = \App\Models\Application::where(['id'=>$id])->first();
        
        if (blank($applicationDetails)) {
            return back()->with('Invalid application id.');
        }

        $request->validate(\App\Http\Requests\ApplicationRequest::update());

        \DB::table('application_tenants')->where('application_id',$id)->delete();
        for ($i=0; $i < count($request->first_name); $i++) { 
            $inputTenant['application_id']     =  $id;
            $inputTenant['first_name']      =   $request->first_name[$i];
            $inputTenant['last_name']       =   !blank($request->last_name[$i])?$request->last_name[$i]:'';
            $inputTenant['dob']             =   $request->dob[$i];
            $inputTenant['phone']           =   $request->phone[$i];
            $inputTenant['ssn']             =   $request->ssn[$i];
            $inputTenant['created_at'] = $inputTenant['updated_at'] = date('Y-m-d H:i:s');

            // if($request->hasFile('valid_id')){
            //     $inputTenant['valid_id'] = time().$i.'.'.$request->valid_id[$i]->extension();
            //     $request->valid_id[$i]->move(public_path('uploads/images/valid_id'), $inputTenant['valid_id']);
            // }
            $inputTenant['valid_id'] = '';

            \DB::table('application_tenants')->insert($inputTenant);
        }

        \DB::table('pets')->where('application_id',$id)->delete();
        for ($i=0; $i < count($request->breed); $i++) { 
            $inputPet['application_id']  =  $id;
            $inputPet['breed']           =   $request->breed[$i];
            $inputPet['weight']          =   $request->weight[$i];

            \DB::table('pets')->insert($inputPet);
        }

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

        \DB::table('renter_history')->where('application_id',$id)->update($inputRenterHistory);

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

        \DB::table('employement_history')->where('application_id',$id)->update($inputEmployement);

        \DB::table('references')->where('application_id',$id)->delete();
        for ($i=0; $i < count($request->reference_name); $i++) { 
            $inputReference['application_id']=  $id;
            $inputReference['name']     =   $request->reference_name[$i];
            $inputReference['phone']    =   $request->reference_phone[$i];

            \DB::table('references')->insert($inputReference);
        }

        \DB::table('emergency_contacts')->where('application_id',$id)->delete();
        for ($i=0; $i < count($request->emergency_name); $i++) { 
            $inputEmergency['application_id']=  $id;
            $inputEmergency['name']         =   $request->emergency_name[$i];
            $inputEmergency['phone']        =   $request->emergency_phone[$i];
            $inputEmergency['relationship'] =   $request->relationship[$i];

            \DB::table('emergency_contacts')->insert($inputEmergency);
        }

        $inputVehicle['car_no_parking_required'] =   $request->car_no_parking_required;
        $inputVehicle['color']                   =   $request->color;
        $inputVehicle['make']                    =   $request->make;
        $inputVehicle['year']                    =   $request->year;
        $inputVehicle['model']                   =   $request->model;
        $inputVehicle['dln']                     =   $request->dln;
        $inputVehicle['licence_plate_number']    =   $request->licence_plate_number;

        \DB::table('vehicle_info')->where('application_id',$id)->update($inputVehicle);

        return redirect()->route('owner-home')->with('success','Application updated Successfully.');
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
