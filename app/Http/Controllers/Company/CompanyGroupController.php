<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;
use Illuminate\View\View;
use App\Models\Group;
use App\Models\Guide;
use App\Models\Location;
use Session;
use File;
use Auth;
use Carbon\Carbon;
class CompanyGroupController extends Controller
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
      
        $groups=Group::where('company_id',Auth::id())->get();
        return view('company.group.index',compact('groups'));
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(): View
    {
        $guides=Guide::where('company_id',Auth::id())->get();
        $mecca_hotels = Location::where('company_id',Auth::id())->where('type','Mecca')->get();
        $city_hotels = Location::where('company_id',Auth::id())->where('type','City')->get();
        $minas = Location::where('company_id',Auth::id())->where('type','Mina')->get();
        $arafats = Location::where('company_id',Auth::id())->where('type','Arafat')->get();
        return view('company.group.create',compact('guides','mecca_hotels','city_hotels','minas','arafats'));
    }

    public function store(Request $request){
      try {
      
        $name = Helper::encode_localizedInput('name',$request->all());
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
        Session::put('success', 'Group created successfully !');
        return redirect()->route('company.group');
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }

    public function delete(Request $request,$id){
        if(Group::find($id)){
            Group::find($id)->delete();
            Session::put('success', 'Group deleted successfully !');
            return redirect()->back();
        }else{
            Session::put('error', 'Operation Failed !');
            return redirect()->back();
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
        return view('company.group.edit',compact('group','guides','mecca_hotels','city_hotels','minas','arafats'));
    }

    public function update(Request $request,$id){
      try {
        $name = Helper::encode_localizedInput('name',$request->all());
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
        Session::put('success', 'Group updated successfully !');
        return redirect()->back();
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }
}
