<?php

namespace App\Http\Controllers\Company;

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
      $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
      
        $companyUsers=CompanyUser::where('company_id',Auth::id())->latest()->get();
        return view('company.users.index',compact('companyUsers'));
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(): View
    {
        return view('company.users.create');
    }

    public function store(Request $request){
          $this->validate($request, [
        'email' => 'required|email|max:255|unique:company_users'
    ]);
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
        // $user->group_id=json_encode($request->selectedgroups);
         $user->group_id = $request->has('selectedgroups') ? json_encode($request->selectedgroups) : null; // Check if selectedgroups exists
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
        Session::put('success', 'User created successfully !');
        return redirect()->route('company.user');
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }

    public function delete(Request $request,$id){
        if(CompanyUser::find($id)){
          CompanyUser::find($id)->delete();
          Session::put('success', 'User deleted successfully !');
          return redirect()->back();
        }else{
          Session::put('error', 'Operation Failed !');
          return redirect()->back();
        }
    }

    public function edit(Request $request,$id)
    {
        $companyUser=CompanyUser::find($id);
        return view('company.users.edit',compact('companyUser'));
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
        Session::put('success', 'User updated successfully !');
        return redirect()->back();
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }
}
