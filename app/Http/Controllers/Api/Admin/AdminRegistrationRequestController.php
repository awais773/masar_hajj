<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegistrationRequest;
use Illuminate\View\View;
use App\Helper\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use Carbon\Carbon;
class AdminRegistrationRequestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth:api');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $registrationRequests=RegistrationRequest::where('request_status',0)->get();
        return response()->json(['data' => $registrationRequests, 'status' => 'success',]);
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function approved()
    {
        $registrationRequests=RegistrationRequest::where('request_status',1)->get();
        return response()->json(['data' => $registrationRequests, 'status' => 'success',]);
    
    }

    public function reject()
    {
        $registrationRequests=RegistrationRequest::where('request_status',3)->get();
        return response()->json(['data' => $registrationRequests, 'status' => 'success',]);
    }
    public function store(Request $request){
      try {
       
        $registrationRequest = new RegistrationRequest();
        $registrationRequest->comp_name=$request->compname;
        $registrationRequest->comp_phone=$request->compphone;
        $registrationRequest->comp_email=$request->compemail;
        $registrationRequest->comp_description=$request->compmessage;
        $registrationRequest->request_status=0;
        $registrationRequest->registration_date=Carbon::now();
        $registrationRequest->lang=Session::get('locale')?Session::get('locale'):'en';
        $registrationRequest->save();
        return response()->json(['message' => 'Registration request created successfully !', 'status' => 'success',]);

      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
      }
    }

    public function delete(Request $request,$id){
        if(RegistrationRequest::find($id)){
            RegistrationRequest::find($id)->delete();
            return response()->json(['message' => 'Registration request deleted successfully !', 'status' => 'success',]);

        }else{
          return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);

        }
    }

    public function update(Request $request,$id,$status){
        try {
            $registrationRequest = RegistrationRequest::find($id);
            $registrationRequest->request_status=$status;
            $registrationRequest->status_action_date=Carbon::now();
            $registrationRequest->lang=Session::get('locale')?Session::get('locale'):'en';
            $registrationRequest->save();
            return response()->json(['message' => 'Registration request updated successfully !', 'status' => 'success',]);

          } catch (\Throwable $th) {
            return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
          }
    }
  
}
