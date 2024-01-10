<?php

namespace App\Http\Controllers\Admin;

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
      $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $companies=User::with(['companyusers','companyadmins'])->where('type',0)->get();
        
        return view('admin.company.index',compact('companies'));
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(): View
    {
        return view('admin.company.create');
    }

    public function store(Request $request){
      try {
       
        $name = Helper::encode_localizedInput('name', $request->all());
        $user = new User();
        $user->name=$name;
        $user->email=$request->email;
        $user->temp_password=$request->password;
        $user->type=0;
        $user->password=Hash::make($request->password);
        if($request->file('country_image')) {
          $fileName = "country".time().'_'.$request->country_image->getClientOriginalName();
          $request->country_image->move(public_path('uploads/company'), $fileName);
          $user->country_image=asset('/').'uploads/company/'.$fileName;
          
        }
        if($request->file('company_logo')) {
          $fileName = "comapny".time().'_'.$request->company_logo->getClientOriginalName();
          $request->company_logo->move(public_path('uploads/company'), $fileName);
          $user->company_logo=asset('/').'uploads/company/'.$fileName;
        
        }
        $user->country_name=$request->country_name;
        $user->save();
        Session::put('success', 'Company created successfully !');

        return redirect()->route('admin.company.index');
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }

    public function delete(Request $request,$id){
        if(User::find($id)){
            User::find($id)->delete();
            return response()->json(['message' => 'Company deleted successfully !', 'status' => 'success','code'=>200]);
        }else{
            return response()->json(['error' => 'Operation Failed !']);
        }
    }

    public function edit(Request $request,$id)
    {
        $company=User::find($id);
        return view('admin.company.edit',compact('company'));
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
            if($request->file('country_image')) {
              $fileName = "country".time().'_'.$request->country_image->getClientOriginalName();
              $request->country_image->move(public_path('uploads/company'), $fileName);
              $user->country_image=asset('/').'uploads/company/'.$fileName;
              if(file_exists($request->country_image_old) ){
                unlink($request->country_image_old);
              }
            }
            if($request->file('company_logo')) {
              $fileName = "comapny".time().'_'.$request->company_logo->getClientOriginalName();
              $request->company_logo->move(public_path('uploads/company'), $fileName);
              $user->company_logo=asset('/').'uploads/company/'.$fileName;
              if(file_exists($request->company_logo_old) ){
                unlink($request->company_logo_old);
              }
            }
            $user->country_name=$request->country_name;
            $user->save();
            Session::put('success', 'Company updated successfully !');
            return redirect()->back();
          } catch (\Throwable $th) {
           dd($th->getMessage());
            Session::put('error', 'Operation Failed !');
            return redirect()->back();
          }
    }

    public function companyUser(Request $request,$id){
      try {
        $companyUsers=CompanyUser::where('company_id',$id)->get();
        return view('admin.company.user',compact('companyUsers'));
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }
    public function companyUserdelete(Request $request,$id){
      try {
        CompanyUser::find($id)->delete();
        Session::put('success', 'Company user deleted successfully !');
        return redirect()->back();
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }
  
}
