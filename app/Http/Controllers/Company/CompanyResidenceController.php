<?php

namespace App\Http\Controllers\Company;

use File;
use Session;
use Carbon\Carbon;
use App\Helper\Helper;
use App\Models\Location;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class CompanyResidenceController extends Controller
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
      
        $locations=Location::where('company_id',Auth::id())->paginate(3);
        return view('company.residence.index',compact('locations'));
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(): View
    {
        return view('company.residence.create');
    }

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
        Session::put('success', 'Residence created successfully !');
        return redirect()->route('company.residence');
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }

    public function delete(Request $request,$id){
        if(Location::find($id)){
            Location::find($id)->delete();
            Session::put('success', 'Residence deleted successfully !');
            return redirect()->back();
        }else{
            Session::put('error', 'Operation Failed !');
            return redirect()->back();
        }
    }

    public function edit(Request $request,$id)
    {
        $location=Location::find($id);
        return view('company.residence.edit',compact('location'));
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
        Session::put('success', 'Location updated successfully !');
        return redirect()->back();
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }
}
