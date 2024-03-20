<?php

namespace App\Http\Controllers\Admin;

use Session;
use Carbon\Carbon;
use App\Helper\Helper;
use Illuminate\View\View;
use League\ISO3166\ISO3166;
use Illuminate\Http\Request;
use App\Models\RegistrationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminRegistrationRequestController extends Controller
{
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $registrationRequests=RegistrationRequest::where('request_status',0)->latest()->get();
        return view('admin.registrationRequest.index',compact('registrationRequests'));
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function approved(): View
    {
        $registrationRequests=RegistrationRequest::where('request_status',1)->latest()->get();
        return view('admin.registrationRequest.ApprovedRequest',compact('registrationRequests'));
    }

    public function reject(): View
    {
        $registrationRequests=RegistrationRequest::where('request_status',3)->latest()->get();
        return view('admin.registrationRequest.RejectRequest',compact('registrationRequests'));
    }
    public function store(Request $request){
      try {
       $validator = Validator::make($request->all(), [
          'compname'=>'required|unique:registration_requests,comp_name',
          'compphone'=>'required|unique:registration_requests,comp_phone',
          "compemail"=>'required|unique:registration_requests,comp_email',
          // "compmessage"=>'required',
        ]);
        if($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
        }
        $phoneWithCode = $request->input('country_code') . $request->input('compphone');
        $registrationRequest = new RegistrationRequest();
        $registrationRequest->comp_name=$request->compname;
        $registrationRequest->comp_phone = $phoneWithCode;
        $registrationRequest->comp_email=$request->compemail;
        $registrationRequest->pricing_plan=$request->pricing_plan;
        $registrationRequest->comp_description=$request->compmessage;
        $registrationRequest->country=$request->country;
        $registrationRequest->request_status=0;
        $registrationRequest->registration_date=Carbon::now();
        $registrationRequest->lang=Session::get('locale')?Session::get('locale'):'en';
        // $iso3166 = new ISO3166();
        // $countryData = $iso3166->alpha2($request->input('country_code'));
        // $registrationRequest->country = $countryData['name'];
        $registrationRequest->save();
        Session::put('success', 'Registration request created successfully !');
        return redirect()->back();
      } catch (\Throwable $th) {      
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }

    public function delete(Request $request,$id){
        if(RegistrationRequest::find($id)){
            RegistrationRequest::find($id)->delete();
            Session::put('success', 'Registration request deleted successfully !');
            return redirect()->back();
        }else{
            Session::put('error', 'Operation Failed !');
            return redirect()->back();
        }
    }

    public function update(Request $request,$id,$status){
        try {
            $registrationRequest = RegistrationRequest::find($id);
            $registrationRequest->request_status=$status;
            $registrationRequest->status_action_date=Carbon::now();
            $registrationRequest->lang=Session::get('locale')?Session::get('locale'):'en';
            $registrationRequest->save();
            Session::put('success', 'Registration request updated successfully !');
            return redirect()->back();
          } catch (\Throwable $th) {
            Session::put('error', 'Operation Failed !');
            return redirect()->back();
          }
    }
  
}
