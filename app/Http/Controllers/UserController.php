<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TenantRequest;

class UserController extends Controller
{    
    /**
     * home
     *
     * @return void
     */
    public function home(){
        if (\Auth::check()) {
            if (\Auth::user()->is_owner == \Config::get('constant.owners.true', 'default')) {
                return redirect()->route('owner-home');
            }
            return redirect()->route('tenant-home');
        }
        return redirect()->route('login');
    }
        
    /**
     * register
     *
     * @param  mixed $request
     * @param  mixed $email
     * @return void
     */
    public function register(Request $request,$email){
        # checking refered user or not
        $referenceChk = \App\Models\ReferTenant::where('tenant_email',$email)->first();
        if (blank($referenceChk)) {
            abort(401, 'This action is unauthorized.');
        }
        
        # checking already register user or not
        $user = \App\Models\User::where('email',$email)->first();
        if (!blank($user)) {
            return "<h1>You are already register with us</h1><a href='".route('login')."'>Click To Login</a>";
        }
        
        # checking users apllication accepted or not
        $application = \App\Models\Application::where('email',$email)->first();
        if (!blank($application)) {
            # application is pending
            if ($application->application_status == \Config::get('constant.application.pending')) {
                return redirect()->route('login')->with('error','Your application is pending');
            }
            # application declined
            if ($application->application_status == \Config::get('constant.application.decline')) {
                return redirect()->route('login')->with('error','Your application is declined');
            }
        }

        # if user referred but not fill the application form
        if (!blank($referenceChk) && blank($application)) {
            return redirect()->route('tenant-application')->with('error','Please fill your application first');
        }
        return view('register',compact('application'));
    }
    
    /**
     * tenantRegister
     *
     * @param  mixed $request
     * @return void
     */
    public function tenantRegister(Request $request){
        if($request->isMethod('post')){
            # validate
            $request->validate(TenantRequest::tenant_register());

            $application = \App\Models\Application::where([
                                                    'email'=>$request->email,
                                                    'application_status'=>\Config::get('constant.application.confirm')
                                                ])
                                                ->first();

            if (blank($application)) {
                return back()->with('error','You are not aurthorized to register');
            }

            $inputs = $request->all();
            if($request->hasFile('profile_image')){
                $inputs['profile_image'] = time().'.'.$request->profile_image->extension();
                $request->profile_image->move(public_path('uploads/images/profile_image'), $inputs['profile_image']);
            }
            if($request->hasFile('financials')){
                $inputs['financials'] = time().'.'.$request->financials->extension();
                $request->financials->move(public_path('uploads/images/financials'), $inputs['financials']);
            }
            // if($request->hasFile('valid_id')){
            //     $inputs['valid_id'] = time().'.'.$request->valid_id->extension();
            //     $request->valid_id->move(public_path('uploads/images/valid_id'), $inputs['valid_id']);
            // }
            $inputs['password'] = \Hash::make($inputs['password']);
            $result = \App\Models\User::create($inputs);
            if ($result) {
                return redirect()->route('login')->with('success','Register Successfully');
            }
            return back()->with('error','oops! Try again.');
        }
    }
}
