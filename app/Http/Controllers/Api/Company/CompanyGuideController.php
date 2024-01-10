<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;
use Illuminate\View\View;
use App\Models\Guide;
use Session;
use File;
use Auth;
use Carbon\Carbon;
class CompanyGuideController extends Controller
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
      
        $guides=Guide::where('company_id',Auth::id())->get();
        return response()->json(['data' => $guides, 'status' => 'success','code'=>200]);

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
        return response()->json(['message' => 'Guide created successfully !', 'status' => 'success','code'=>200]);

      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);

      }
    }

    public function delete(Request $request,$id){
        if(Guide::find($id)){
          Guide::find($id)->delete();
          return response()->json(['message' => 'Guide deleted successfully !', 'status' => 'success','code'=>200]);
        }else{
          return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
        }
    }

    public function edit(Request $request,$id)
    {
        $guide=Guide::find($id);
        return response()->json(['guide' => $guide, 'status' => 'success','code'=>200]);
    }

    public function update(Request $request,$id){
      try {
      
       
        $firstname = Helper::encode_localizedInput('firstname', $request->all());
        $lastname = Helper::encode_localizedInput('lastname', $request->all());

        $guide = Guide::find($id);
        $guide->firstname=$firstname;
        $guide->lastname=$lastname;
        $guide->email=$request->email;
        $guide->username=$request->username;
        $guide->password=$request->password;
        $guide->create_date=Carbon::now();
        $guide->company_id=Auth::id();
        $guide->save();
        return response()->json(['message' => 'Guide updated successfully !', 'status' => 'success','code'=>200]);
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
      }
    }
}
