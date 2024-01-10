<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;
use Illuminate\View\View;
use App\Models\Dua;
use Session;
use File;
class AdminDuaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth"api');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        $duas=Dua::get();
        return response()->json(['data' => $duas, 'status' => 'success',]);
    }
      
    public function store(Request $request){
      try {
      
        $title = Helper::encode_localizedInput('title',$request->all());
        $description = Helper::encode_localizedInput('description',$request->all());

        $dua = new Dua();
        $dua->title=$title;
        $dua->description=$description;
        $dua->lang=Session::get('locale')?Session::get('locale'):'en';
        if($request->file('image')) {
          $fileName = time().'_'.$request->image->getClientOriginalName();
          $request->image->move(public_path('uploads/dua'), $fileName);
          $dua->image=asset('/').'uploads/dua/'.$fileName;
        }
        $dua->save();
        return response()->json(['message' => 'Dua created successfully !', 'status' => 'success','code'=>200]);
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
      }
    }

    public function delete(Request $request,$id){
        if(Dua::find($id)){
          Dua::find($id)->delete();
          return response()->json(['message' => 'Dua deleted successfully !', 'status' => 'success','code'=>200]);
        }else{
          return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
        }
    }

    public function edit(Request $request,$id)
    {
        $dua=Dua::find($id);
        return response()->json(['data' => $dua, 'status' => 'success','code'=>200]);
    }

    public function update(Request $request,$id){
      try {
        $title = Helper::encode_localizedInput('title',$request->all());
        $description = Helper::encode_localizedInput('description',$request->all());
        $dua = Dua::find($id);
        $dua->title=$title;
        $dua->description=$description;
        $dua->lang=Session::get('locale')?Session::get('locale'):'en';
        if($request->file('image')) {
          $fileName = time().'_'.$request->image->getClientOriginalName();
          $request->image->move(public_path('uploads/dua'), $fileName);
          $dua->image=asset('/').'uploads/dua/'.$fileName;
          if(file_exists($request->image_old) ){
            unlink($request->image_old);
          }
        }
        $dua->save();

        return response()->json(['message' => 'Dua Updated successfully !', 'status' => 'success','code'=>200]);
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
      }
    }
}
