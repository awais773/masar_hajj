<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;
use Illuminate\View\View;
use App\Models\HajjProcedure;
use Session;
use File;
class AdminHajjProcedureController extends Controller
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
      
        $hajjprocedures=HajjProcedure::get();
        return response()->json(['data' => $hajjprocedures, 'status' => 'success',]);
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function store(Request $request){
      try {
      
        $title = Helper::encode_localizedInput('title',$request->all());
        $description = Helper::encode_localizedInput('description',$request->all());

       
        $hajjProcedure = new HajjProcedure();
        $hajjProcedure->title=$title;
        $hajjProcedure->content=$description;
        if($request->file('icon')) {
          $fileName = time().'_'.$request->icon->getClientOriginalName();
          $request->icon->move(public_path('uploads/hajjProcedure'), $fileName);
          $hajjProcedure->icon=asset('/').'uploads/hajjProcedure/'.$fileName;
        }
        $hajjProcedure->save();
      
        return response()->json(['message' =>'Hajj Procedure created successfully !', 'status' => 'success',]);
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
      }
    }

    public function delete(Request $request,$id){
        if(HajjProcedure::find($id)){
          HajjProcedure::find($id)->delete();
          return response()->json(['message' =>'Hajj Procedure deleted successfully !', 'status' => 'success',]);
        }else{
          return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
        }
    }

    public function edit(Request $request,$id)
    {
        $hajjProcedure=HajjProcedure::find($id);
        return response()->json(['data' =>$hajjProcedure, 'status' => 'success',]);
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

        return response()->json(['message' =>'Hajj Procedure updated successfully !', 'status' => 'success',]);
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
      }
    }
}
