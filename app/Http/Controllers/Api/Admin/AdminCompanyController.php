<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CompanyUser;
use Illuminate\View\View;
use App\Helper\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
class AdminCompanyController extends Controller
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
        $companies=User::with('companyusers')->where('type',0)->get();
        return response()->json(['data' => $companies, 'status' => 'success',]);
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function add(): View
    // {
    //     return view('admin.company.create');
    // }

    public function store(Request $request){
      try {
        $name = Helper::encode_localizedInput('name', $request->all());
        
        $user = new User();
        $user->name=$name;
        $user->email=$request->email;
        $user->temp_password=$request->password;
        $user->type=0;
        $user->password=Hash::make($request->password);
        $user->save();
        return response()->json(['message' => 'Company created successfully !', 'status' => 'success','code'=>200]);
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
      }
    }

    public function delete(Request $request,$id){
        if(User::find($id)){
            User::find($id)->delete();
            return response()->json(['message' => 'Company deleted successfully !', 'status' => 'success','code'=>200]);
           
        }else{
            return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
        }
    }

    public function edit(Request $request,$id)
    {
        $company=User::find($id);
        return response()->json(['data' => $company, 'status' => 'success','code'=>200]);
       
    }

    public function update(Request $request,$id){
        try {
            $name = Helper::encode_localizedInput('name', $request->all());
            $user = User::find($id);
            $user->name=$name;
            $user->type=0;
            $user->email=$request->email;
            $user->temp_password=$request->password;
            $user->password=Hash::make($request->password);
            $user->save();
            return response()->json(['message' => 'Company updated successfully !', 'status' => 'success','code'=>200]);
          } catch (\Throwable $th) {
            return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
          }
    }

    public function companyUser(Request $request,$id){
      try {
        $companyUsers=CompanyUser::where('company_id',$id)->get();
        return response()->json(['data' => $companyUsers, 'status' => 'success','code'=>200]);
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
      }
    }
    public function companyUserdelete(Request $request,$id){
      try {
        CompanyUser::find($id)->delete();
        return response()->json(['message' =>'Company user deleted successfully !', 'status' => 'success','code'=>200]);
      } catch (\Throwable $th) {
          return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
      }
    }
  
}
