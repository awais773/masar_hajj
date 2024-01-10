<?php

namespace App\Http\Controllers\Admin;

use File;
use Session;
use App\Helper\Helper;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\HajjProcedure;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminHajjProcedureController extends Controller
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
      
        $hajjprocedures=HajjProcedure::where('company_id',Auth::id())->get();
        return view('admin.hajjProcedure.index',compact('hajjprocedures'));
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(): View
    {
        return view('admin.hajjProcedure.create');
    }

    public function store(Request $request){
      try {
      
        $title = Helper::encode_localizedInput('title',$request->all());
        $description = Helper::encode_localizedInput('description',$request->all());

       
        $hajjProcedure = new HajjProcedure();
        $hajjProcedure->title=$title;
        $hajjProcedure->content=$description;
        $hajjProcedure->company_id=Auth::id();
        if($request->file('icon')) {
          $fileName = time().'_'.$request->icon->getClientOriginalName();
          $request->icon->move(public_path('uploads/hajjProcedure'), $fileName);
          $hajjProcedure->icon=asset('/').'uploads/hajjProcedure/'.$fileName;
        }
        $hajjProcedure->save();
        Session::put('success', 'Hajj Procedure created successfully !');
        return redirect()->route('admin.hajjprocedure.index');
      } catch (\Throwable $th) {
        
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }

    public function delete(Request $request,$id){
        if(HajjProcedure::find($id)){
          HajjProcedure::find($id)->delete();
            Session::put('success', 'Hajj Procedure deleted successfully !');
            return redirect()->back();
        }else{
            Session::put('error', 'Operation Failed !');
            return redirect()->back();
        }
    }

    public function edit(Request $request,$id)
    {
        $hajjProcedure=HajjProcedure::find($id);
        return view('admin.hajjProcedure.edit',compact('hajjProcedure'));
    }

    public function update(Request $request,$id){
      try {
      
        $title = Helper::encode_localizedInput('title',$request->all());
        $description = Helper::encode_localizedInput('description',$request->all());

        $hajjProcedure = HajjProcedure::find($id);
        $hajjProcedure->title=$title;
        $hajjProcedure->content=$description;
        if($request->file('icon')) {
          $fileName = time().'_'.$request->icon->getClientOriginalName();
          $request->icon->move(public_path('uploads/hajjProcedure'), $fileName);
          $hajjProcedure->icon=asset('/').'uploads/hajjProcedure/'.$fileName;
          if(file_exists($request->icon_old) ){
            unlink($request->icon_old);
          }
        }else{
          $hajjProcedure->icon=$request->icon_old;
        }
        $hajjProcedure->save();
        Session::put('success', 'Hajj Procedure updated successfully !');
        return redirect()->back();
      } catch (\Throwable $th) {
        
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }
}
