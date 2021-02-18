<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TenantRequest;

class TenantController extends Controller
{
    
    /**
     * index Tenant Home
     *
     * @return void
     */
    public function index(){
        $maintenanceRequests = \App\Models\MaintenanceRequest::where('users_id',\Auth::user()->id)
                                                                ->select('status','created_at')
                                                                ->get();
        return view('tenant.index',compact('maintenanceRequests'));
    }
    
    /**
     * profile
     *
     * @return void
     */
    public function profile(){
        $userDetails = \App\Models\User::find(\Auth::user()->id); 
        return view('tenant.profile',compact('userDetails'));
    }
    
    /**
     * updateProfile
     *
     * @param  mixed $request
     * @return void
     */
    public function updateProfile(Request $request){
        $user = \App\Models\User::find(\Auth::user()->id); 

        if($request->isMethod('post')){
            # validate
            $request->validate(TenantRequest::update_profile());

            $userProfile = \DB::table('users')->where('id',\Auth::user()->id)->first();

            $inputs = $request->all();

            if (!blank($inputs['password'])) {
                if (\Hash::check($request->password, $user->password)) {
                    return back()->with('error','Current password & new password must be different.');
                }else{
                    $user->password = \Hash::make($inputs['password']);
                }
            }else{
                $user->password = $user->password;
            }

            if($request->hasFile('profile_image')){
                # deleting prevoius image
                \File::delete(public_path('uploads/images/profile').'/'.$userProfile->profile_image);

                $user->profile_image = time().'.'.$request->profile_image->extension();
                $request->profile_image->move(public_path('uploads/images/profile'), $user->profile_image);
            }
            if($request->hasFile('financials')){
                # deleting prevoius image
                \File::delete(public_path('uploads/images/financials').'/'.$userProfile->financials);

                $user->financials = time().'.'.$request->financials->extension();
                $request->financials->move(public_path('uploads/images/financials'), $user->financials);
            }
            if($request->hasFile('valid_id')){
                # deleting prevoius image
                \File::delete(public_path('uploads/images/valid_id').'/'.$userProfile->valid_id);

                $user->valid_id = time().'.'.$request->valid_id->extension();
                $request->valid_id->move(public_path('uploads/images/valid_id'), $user->valid_id);
            }
            
            $result = $user->save();
            if ($result) {
                return redirect()->route('tenant-profile')->with('success','Profile updated Successfully.');
            }
            return back()->with('error','oops! Try again.');
        }
        return view('tenant.editProfile',compact('user'));
    }
    
    /**
     * maintenanceRequest
     *
     * @param  mixed $request
     * @return void
     */
    public function maintenanceRequest(Request $request){
        $request->validate(TenantRequest::maintenance_request());

        $inputs = $request->all();
        $inputs['users_id'] = \Auth::user()->id;
        $inputs['available_time']  = implode(',',$inputs['available_time']);

        $result = \App\Models\MaintenanceRequest::create($inputs);
        if ($result) {
            return back()->with('success','Request sent Successfully.');
        }
        return back()->with('error','oops! Try again.');
    }
}
