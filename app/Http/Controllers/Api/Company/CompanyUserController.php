<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;
use Illuminate\View\View;
use App\Models\CompanyUser;
use Session;
use File;
use Auth;
use Carbon\Carbon;
class CompanyUserController extends Controller
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
      
      $companyUsers=CompanyUser::where('company_id',Auth::id())->latest()->get();
      return response()->json(['companyUsers' => $companyUsers,'status' => 'success',]);
    }



    public function store(Request $request){
      try {
       
        $firstname = Helper::encode_localizedInput('firstname',$request->all());
        $lastname = Helper::encode_localizedInput('lastname',$request->all());
        $user = new CompanyUser();
        $user->firstname=$firstname;
        $user->lastname=$lastname;
        $user->email=$request->email;
        $user->username=$request->username;
        $user->password=$request->password;
        $user->company_id=Auth::id();
        $user->group_id=json_encode($request->selectedgroups);
        $user->phone=$request->phone;
        $user->passport_num=$request->passport_num;
        $user->passport_date=$request->passport_date;
        $user->visa_num=$request->visa_num;
        $user->visa_date=$request->visa_date;
        $user->visa_period=$request->visa_period;
        $user->active =$request->active ==1? 1 : 0;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->save();
        return response()->json(['message' => 'User created successfully !','status' => 'success',]);
       
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);

      }
    }



    public function delete(Request $request,$id){
      if(CompanyUser::find($id)){
        CompanyUser::find($id)->delete();
        return response()->json(['
        message' => 'Hajji deleted successfully !', 
        'success' => true,
        'code'=>200]);
      }else{
        return response()->json(['message' => 'Operation Failed !', 
        'success' => false,
        'code'=>501]);
      }
  }

    public function edit(Request $request,$id)
    {
        $companyUser=CompanyUser::find($id);
        return response()->json(['data' =>$companyUser,'status' => 'success',]);

    }

    public function update(Request $request,$id){
      try {
        $firstname = Helper::encode_localizedInput('firstname',$request->all());
        $lastname = Helper::encode_localizedInput('lastname',$request->all());
        $user = CompanyUser::find($id);
        $user->firstname=$firstname;
        $user->lastname=$lastname;
        $user->email=$request->email;
        $user->username=$request->username;
        $user->password=$request->password;
        $user->company_id=Auth::id();
        $user->group_id=json_encode($request->selectedgroups);
        $user->phone=$request->phone;
        $user->passport_num=$request->passport_num;
        $user->passport_date=$request->passport_date;
        $user->visa_num=$request->visa_num;
        $user->visa_date=$request->visa_date;
        $user->visa_period=$request->visa_period;
        $user->active =$request->active ==1? 1 : 0;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->save();
        return response()->json(['message' => 'User updated successfully !','status' => 'success',]);
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
      }
    }
}
