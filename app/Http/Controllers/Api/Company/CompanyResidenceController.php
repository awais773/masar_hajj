<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;
use Illuminate\View\View;
use App\Models\Location;
use Session;
use File;
use Auth;
use Carbon\Carbon;
class CompanyResidenceController extends Controller
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
      $locations=Location::get();
      return response()->json(['data' => $locations, 'status' => 'success','code'=>200]);
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function store(Request $request){
      try {
     
        $name = Helper::encode_localizedInput('name',$request->all());
        $address = Helper::encode_localizedInput('address',$request->all());
        $location = new Location();
        $location->name=$name;
        $location->address=$address;
        $location->type=$request->type;
        $location->mobile=$request->mobile;
        $location->my_address=$request->my_address;
        $location->company_id=$request->company_id;
        $location->googlemapurl=$request->googlemapurl;
        $location->latitude=$request->latitude;
        $location->longitude=$request->longitude;
        $location->active =$request->active ==1? 1 : 0;
        $location->save();
        return response()->json(['message' => 'Residence created successfully !','status' => 'success',]);
       
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
      }
    }

    public function delete(Request $request,$id){
        if(Location::find($id)){
            Location::find($id)->delete();
            return response()->json(['message' => 'Residence deleted successfully !','status' => 'success',]);

        }else{
          return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);

        }
    }

    public function edit(Request $request,$id)
    {
        $location=Location::find($id);
        return response()->json(['data' => $location,'status' => 'success',]);

    }

    public function update(Request $request,$id){
      try {
      
        $name = Helper::encode_localizedInput('name',$request->all());
        $address = Helper::encode_localizedInput('address',$request->all());
        $location = Location::find($id);
        $location->name=$name;
        $location->address=$address;
        $location->type=$request->type;
        $location->mobile=$request->mobile;
        $location->my_address=$request->my_address;
        $location->company_id=$request->company_id;
        $location->googlemapurl=$request->googlemapurl;
        $location->latitude=$request->latitude;
        $location->longitude=$request->longitude;
        $location->active =$request->active ==1? 1 : 0;
        $location->save();
        return response()->json(['message' => 'Residence updated successfully !','status' => 'success',]);
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
      }
    }
}
