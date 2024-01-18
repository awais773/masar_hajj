<?php

namespace App\Http\Controllers\Api\Company;

use File;
use Session;
use Carbon\Carbon;
use App\Models\Group;
use App\Models\Guide;
use App\Helper\Helper;
use App\Models\Location;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class CompanyGroupController extends Controller
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
      
        $groups=Group::where('company_id',Auth::id())->get();
        return response()->json(['data' => $groups, 'status' => 'success','code'=>200]);
    }

    public function store(Request $request){
      try {
      
        $name = Helper::encode_localizedInput('name', $request->only('name_en','name_ar'));
        $group = new Group();
        $group->name=$name;
        $group->guide_id=$request->guide_id;
        $group->mecca_id=$request->mecca_id;
        $group->city_id=$request->city_id;
        $group->company_id=$request->company_id;
        $group->mina_id=$request->mina_id;
        $group->arafat_id=$request->arafat_id;
        $group->active =$request->active ==1? 1 : 0;
        $group->save();
        return response()->json(['message' => 'Group created successfully !', 'status' => 'success','code'=>200]);
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);

      }
    }

    public function delete(Request $request,$id){
        if(Group::find($id)){
            Group::find($id)->delete();
            return response()->json(['message' => 'Group deleted successfully !', 'status' => 'success','code'=>200]);
        }else{
          return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
        }
    }

    public function edit(Request $request,$id)
    {
        $group=Group::find($id);
        $guides=Guide::where('company_id',Auth::id())->get();
        $mecca_hotels = Location::where('company_id',Auth::id())->where('type','Mecca')->get();
        $city_hotels = Location::where('company_id',Auth::id())->where('type','City')->get();
        $minas = Location::where('company_id',Auth::id())->where('type','Mina')->get();
        $arafats = Location::where('company_id',Auth::id())->where('type','Arafat')->get();
        return response()->json(['group' => $group,'guides'=>$guides,'mecca_hotels'=>$mecca_hotels,'city_hotels'=>$city_hotels,'minas'=>$minas,'arafats'=>$arafats, 'status' => 'success','code'=>200]);

    }

    public function update(Request $request,$id){
      try {
        $name = Helper::encode_localizedInput('name', $request->only('name_en','name_ar'));
        $group = Group::find($id);
        $group->name=$name;
        $group->guide_id=$request->guide_id;
        $group->mecca_id=$request->mecca_id;
        $group->city_id=$request->city_id;
        $group->company_id=$request->company_id;
        $group->mina_id=$request->mina_id;
        $group->arafat_id=$request->arafat_id;
        $group->active =$request->active ==1? 1 : 0;
        $group->save();

        return response()->json(['message' => 'Group updated successfully !', 'status' => 'success','code'=>200]);

      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);

      }
     
      
    }
    public function mecca_hotels(){
      
      $mecca_hotels = Location::where('company_id',Auth::id())->where('type','Mecca')->get();
      return response()->json(['data' => $mecca_hotels, 'status' => 'success','code'=>200]);
    }
    public function city_hotels(){
      
      $city_hotels = Location::where('company_id',Auth::id())->where('type','City')->get();
      return response()->json(['data' => $city_hotels, 'status' => 'success','code'=>200]);
    }
    public function minas(){
      
      $minas = Location::where('company_id',Auth::id())->where('type','Mina')->get();
      return response()->json(['data' => $minas, 'status' => 'success','code'=>200]);
    }
    public function arafats(){
      
      $arafats = Location::where('company_id',Auth::id())->where('type','Arafat')->get();
      return response()->json(['data' => $arafats, 'status' => 'success','code'=>200]);
    }
}
