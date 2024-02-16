<?php

namespace App\Http\Controllers\Company;

use File;
use Carbon\Carbon;
use App\Models\Guide;
use App\Helper\Helper;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class CompanyGuideController extends Controller
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
      
        $guides=Guide::where('company_id',Auth::id())->get();
        return view('company.guide.index',compact('guides'));
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(): View
    {
        
        return view('company.guide.create');
    }

    public function store(Request $request){
      try {
        
        $firstname = Helper::encode_localizedInput('firstname',$request->all());
        $lastname = Helper::encode_localizedInput('lastname',$request->all());

        $guide = new Guide();
        $guide->firstname=$firstname;
        $guide->lastname=$lastname;
        $guide->email=$request->email;
        $guide->username=$request->username;
        $guide->password=$request->password;
        $guide->create_date=Carbon::now();
        $guide->company_id=Auth::id();
        $guide->save();
        Session::put('success', 'Guide created successfully !');
        return redirect()->route('admin.guide');
      } catch (\Throwable $th) {
        
        // Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }

    public function delete(Request $request,$id){
        if(Guide::find($id)){
          Guide::find($id)->delete();
            Session::put('success', 'Guide deleted successfully !');
            return redirect()->back();
        }else{
            Session::put('error', 'Operation Failed !');
            return redirect()->back();
        }
    }

    public function edit(Request $request,$id)
    {
        $guide=Guide::find($id);
        return view('company.guide.edit',compact('guide'));
    }

    public function update(Request $request,$id){
      try {
      
       
        $firstname = Helper::encode_localizedInput('firstname',$request->all());
        $lastname = Helper::encode_localizedInput('lastname',$request->all());

        $guide = Guide::find($id);
        $guide->firstname=$firstname;
        $guide->lastname=$lastname;
        $guide->email=$request->email;
        $guide->username=$request->username;
        $guide->password=$request->password;
        $guide->create_date=Carbon::now();
        $guide->company_id=Auth::id();
        $guide->save();
        Session::put('success', 'Guide updated successfully !');
        return redirect()->back();
      } catch (\Throwable $th) {
        
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }
}
