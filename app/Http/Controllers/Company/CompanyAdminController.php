<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;
use Illuminate\View\View;
use App\Models\CompanyAdmin;
use Session;
use File;
use Auth;
class CompanyAdminController extends Controller
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
        $companies=CompanyAdmin::where('company_id',Auth::id())->get();
        return view('company.admin.index',compact('companies'));
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(): View
    {
        return view('company.admin.create');
    }

    public function store(Request $request){
      try {
        $inputs=$request->all();
        $inputs['company_id']=Auth::id();
        CompanyAdmin::create($inputs);
        Session::put('success', 'Admin created successfully !');
        return redirect()->route('company.admin');
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }

    public function delete(Request $request,$id){
        if(CompanyAdmin::find($id)){
          CompanyAdmin::find($id)->delete();
          return response()->json(['message' => 'Admin deleted successfully !', 'status' => 'success','code'=>200]);
        }else{
            return response()->json(['error' => 'Operation Failed !']);
        }
    }

    public function edit(Request $request,$id)
    {
        $admin=CompanyAdmin::find($id);
        return view('company.admin.edit',compact('admin'));
    }

    public function update(Request $request,$id){
      try {
        $inputs=$request->all();
        $inputs['company_id']=Auth::id();
        CompanyAdmin::find($id)->update($inputs);
        Session::put('success', 'Admin Updated successfully !');
        return redirect()->back();
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }
}
