<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UnitRequest;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller
{
    
    /**
     * index
     *
     * @return void
     */
    public function index(){
        # Getting top 3 units 
        $units = \App\Models\Unit::where(['users_id'=>\Auth::user()->id])
                                    ->take(3)
                                    ->orderBy('created_at','DESC')
                                    ->get();
        
        # getting refer email Array
        $referIdArr   =   \App\Models\ReferTenant::where('owner_id',\Auth::user()->id)->pluck('id');
        
        # getting application ID Array
        $applications = \App\Models\Application::whereIn('refer_tenant_id',$referIdArr)
                                                        ->take(3)
                                                        ->orderBy('created_at','DESC')
                                                        //->pluck('id');
                                                        ->get();
                                                        
        # getting Tenants Emails Array
        $tenantEmailArr =   \App\Models\ReferTenant::where([
                                                'owner_id'=>\Auth::user()->id,
                                            ])
                                        ->pluck('tenant_email');
                                        
        # Getting top 3 Users         
        $users = \App\Models\User::where('status',\Config::get('constant.tenant.inactive'))
                                    ->whereIn('email',$tenantEmailArr)
                                    ->take(3)
                                    ->orderBy('created_at','DESC')
                                    ->get(); 
            
        # Getting all users related to owner
        $userIdArr  =    \App\Models\User::where('status',\Config::get('constant.tenant.inactive'))
                                            ->whereIn('email',$tenantEmailArr)
                                            ->where('id','!=',\Auth::user()->id)
                                            ->pluck('id');

        # Getting top 3 Maintenance Requests
        $maintenanceRequests = \App\Models\MaintenanceRequest::whereIn('users_id',$userIdArr)
                                                            ->take(3)
                                                            ->orderBy('created_at','DESC')
                                                            ->get();

        $maintenanceRequests->transform(function($item){
            switch ($item->status) {
                case 'Pending':
                    $item->btnColor = 'btn-warning';
                    break;
                case 'Received':
                    $item->btnColor = 'btn-danger';
                    break;
                case 'Resolved':
                    $item->btnColor = 'btn-success';
                    break;
                case 'Cancelled':
                    $item->btnColor = 'btn-secondary';
                    break;
                default:
                    $item->btnColor = 'btn-warning';
                    break;
            }
            return $item;
        });
                                                    
        return view('owners.units.index',compact('units','applications','users','maintenanceRequests'));
    }
    
    /**
     * allUnits
     *
     * @return void
     */
    public function allUnits(Request $request){
        # Getting all units 
        $page = $request->page ?? 0;
        $offset = 0;
        if($page > 0){
            $offset = $page * 3;
        }
        $units = \App\Models\Unit::where(['users_id'=>\Auth::user()->id])
                                    ->orderBy('created_at','DESC')
                                    ->skip($offset)->take(3)->get();
               
        $next = $offset + 3;         
        
        $count = \App\Models\Unit::where(['users_id'=>\Auth::user()->id])
                                    ->count();
        
        $pendingCount = $count - ($offset + 3);
       
        return view('owners.units.allUnits',compact('units','pendingCount'))->render();
    }

    
    /**
     * addUnit
     *
     * @param  mixed $request
     * @return void
     */
    public function addUnit(Request $request){
        if ($request->isMethod('post')) {
            # validate
            $request->validate(UnitRequest::add_unit_rules());

            $inputs = $request->all();

            # uploading unit image
            if($request->hasFile('upload_image')){
                $inputs['upload_image'] = time().'.'.$request->upload_image->extension();
                $request->upload_image->move(public_path('uploads/images/units'), $inputs['upload_image']);
            }
            $inputs['users_id'] = \Auth::user()->id;
            # Making entry in table of unit table
            $result = \App\Models\Unit::create($inputs);
            if ($result) {
                return back()->with('success','Unit registed Successfully.');
            }
            return back()->with('error','oops! Try again.');
        }
        return view('owners.units.add');
    }
    
    /**
     * sortMaintenanceRequest
     *
     * @param  mixed $request
     * @return void
     */
    public function sortMaintenanceRequest(Request $request){
        $tenantEamilArr =   \App\Models\ReferTenant::where([
                                                    'owner_id'=>\Auth::user()->id,
                                                ])
                                            ->pluck('tenant_email');

        # Getting all users related to owner
        $userIdArr  =    \App\Models\User::where('status',\Config::get('constant.tenant.inactive'))
                                        ->whereIn('email',$tenantEamilArr)
                                        ->where('id','!=',\Auth::user()->id)
                                        ->orderBy('created_at','DESC')
                                        ->pluck('id');
        
        # Getting top 3 Maintenance Requests
        
        if (!blank($request->status)) {
            $maintenanceRequests = \App\Models\MaintenanceRequest::whereIn('users_id',$userIdArr)
                                                                ->where('status',$request->status)
                                                                ->take(3)
                                                                ->orderBy('created_at','DESC')
                                                                ->get();
        }else{
            $maintenanceRequests = \App\Models\MaintenanceRequest::whereIn('users_id',$userIdArr)
                                                                ->take(3)
                                                                ->orderBy('created_at','DESC')
                                                                ->get();
        }

        $maintenanceRequests->transform(function($item){
            switch ($item->status) {
                case 'Pending':
                    $item->btnColor = 'btn-warning';
                    break;
                case 'Received':
                    $item->btnColor = 'btn-danger';
                    break;
                case 'Resolved':
                    $item->btnColor = 'btn-success';
                    break;
                case 'Cancelled':
                    $item->btnColor = 'btn-secondary';
                    break;
                default:
                    $item->btnColor = 'btn-warning';
                    break;
            }
            return $item;
        });
        return view('owners.units.sorting.maintenance',compact('maintenanceRequests'))->render();
    }
    
    /**
     * sortUnits
     *
     * @param  mixed $request
     * @return void
     */
    public function sortUnits(Request $request){

        #$createAtOrder = ($request->unit_sorting=='old')?'ASC':'DESC';

        switch ($request->unit_sorting) {
            case 'old':
                $key = 'created_at';
                $value = 'ASC';
                break;
            case 'new':
                $key = 'created_at';
                $value = 'DESC';
                break;
            case 'a_z':
                $key = 'address';
                $value = 'ASC';
                break;
            case 'z_a':
                $key = 'address';
                $value = 'DESC';
                break;
            default:
                $key = 'created_at';
                $value = 'DESC';
                break;
        }

        # Getting top 3 units 
        $units = \App\Models\Unit::where(['users_id'=>\Auth::user()->id,'status'=>\Config::get('constant.units.status.active')])
                                    ->take(3)
                                    ->orderBy($key,$value)
                                    ->get();
        
        return view('owners.units.sorting.units',compact('units'))->render();
    }
    
    /**
     * searchUnits
     *
     * @param  mixed $request
     * @return void
     */
    public function searchUnits(Request $request){

        $searchUnit = $request->search_unit;

        
        # Getting top 3 units 
        $units = \App\Models\Unit::where(['users_id'=>\Auth::user()->id])
                                ->where('address','like','%'.$searchUnit.'%')
                                ->orWhere('rent','like','%'.$searchUnit.'%')
                                ->orWhere('bedroom','like','%'.$searchUnit.'%')
                                ->orWhere('bathroom','like','%'.$searchUnit.'%')
                                ->orWhere('square_footage','like','%'.$searchUnit.'%')
                                ->take(3)
                                ->orderBy('created_at','DESC')
                                ->get();
        
        if(blank($searchUnit)){
            $units = \App\Models\Unit::where(['users_id'=>\Auth::user()->id])
                                    ->take(3)
                                    ->orderBy('created_at','DESC')
                                    ->get();
        }
        
        return view('owners.units.sorting.units',compact('units'))->render();
    }
    
    /**
     * deleteUnits
     *
     * @param  mixed $request
     * @return void
     */
    public function deleteUnits(Request $request){
        $units = \App\Models\Unit::find($request->unit_id);
        
        if (blank($units)) {
            $result['status'] = false;
            $result['msg']    = '<p class="alert alert-danger">Unit does not exists.</p>';
        }
        \File::delete($units->upload_image);
        //$units->delete();

        $result['status'] = true;
        $result['msg']    = '<p class="alert alert-success">Unit deleted successfully.</p>';
        
        return $result;
    }
    
    /**
     * searchMaintenanceRequest
     *
     * @param  mixed $request
     * @return void
     */
    public function searchMaintenanceRequest(Request $request){

        $searchMaintenance = $request->search_maintenance;

        $tenantEamilArr =   \App\Models\ReferTenant::where([
                                                            'owner_id'=>\Auth::user()->id,
                                                            'status'=>\Config::get('constant.refer.status.active')
                                                        ])
                                                    ->pluck('tenant_email');

        # Getting all users related to owner
        $userIdArr  =    \App\Models\User::where('status',\Config::get('constant.tenant.inactive'))
                                        ->whereIn('email',$tenantEamilArr)
                                        ->where('id','!=',\Auth::user()->id)
                                        ->orderBy('created_at','DESC')
                                        ->pluck('id');

        $maintenanceRequests = \App\Models\MaintenanceRequest::whereIn('users_id',$userIdArr)
                                        ->where('issue','like','%'.$searchMaintenance.'%')
                                        ->orWhere('created_at','like','%'.$searchMaintenance.'%')
                                        ->orWhere('appartment_number','like','%'.$searchMaintenance.'%')
                                        ->take(3)
                                        ->orderBy('created_at','DESC')
                                        ->get();
        
        $maintenanceRequests->transform(function($item){
            switch ($item->status) {
                case 'Pending':
                    $item->btnColor = 'btn-warning';
                    break;
                case 'Received':
                    $item->btnColor = 'btn-danger';
                    break;
                case 'Resolved':
                    $item->btnColor = 'btn-success';
                    break;
                case 'Cancelled':
                    $item->btnColor = 'btn-secondary';
                    break;
                default:
                    $item->btnColor = 'btn-warning';
                    break;
            }
            return $item;
        });
        return view('owners.units.sorting.maintenance',compact('maintenanceRequests'))->render();
        
    }
    
    /**
     * updateUnit
     *
     * @param  mixed $request
     * @return void
     */
    public function updateUnit(Request $request){
        $validate = \Validator::make($request->all(),UnitRequest::update_unit());

        if ($validate->fails()) {
            return $validate->errors()->first();
        }

        $unitDetails = \App\Models\Unit::find($request->unit_id);

        if (blank($unitDetails)) {
            $result['status'] = false;
            $result['msg']  ="<p class='alert alert-danger'>Invalid Unit.</p>";
        }else{
            $unitDetails->bedroom = $request->bedroom;
            $unitDetails->bathroom= $request->bathroom;
            $unitDetails->square_footage = $request->square_footage;
            $unitDetails->rent = $request->rent;
            $unitDetails->save(); 
            $result['status'] = true;
            $result['msg']  ="<p class='alert alert-success'>Unit updated successfully.</p>";
        }

        return $result;
        
    } 
    
    /**
     * sortApplications
     *
     * @param  mixed $request
     * @return void
     */
    public function sortApplications(Request $request){
        # getting all refered tenants by owner
        $referIdArr =  \App\Models\ReferTenant::where('owner_id',\Auth::user()->id)->pluck('id');

        $order = 'DESC';
        $status='';
        if($request->status == 3){
            $order = 'ASC';
        }
        if ($request->status < 3) {
            $status = $request->status;
        }

        if (!blank($status)) {
            $applications   =   \App\Models\Application::whereIn('refer_tenant_id',$referIdArr)
                                                        ->where('application_status',$status)
                                                        ->take(3)
                                                        ->orderBy('email',$order)
                                                        ->get();
        }else{
            $applications   =   \App\Models\Application::whereIn('refer_tenant_id',$referIdArr)
                                                        ->take(3)
                                                        ->orderBy('email',$order)
                                                        ->get();
        }
        return view('owners.units.sorting.applications',compact('applications'))->render();        
    }

    public function searchApplication(Request $request){
        # getting all refered tenants by owner
        $referIdArr =  \App\Models\ReferTenant::where('owner_id',\Auth::user()->id)->pluck('id');

        
    }
}
