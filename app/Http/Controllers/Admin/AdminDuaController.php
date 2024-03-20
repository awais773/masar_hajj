<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Dua;
use App\Helper\Helper;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AdminDuaController extends Controller
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
      
        $duas=Dua::with('company')->where('company_id',Auth::id())->latest()->get();
        return view('admin.dua.index',compact('duas'));
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(): View
    {
        return view('admin.dua.create');
    }

    public function store(Request $request){
      try {
      
        $title = Helper::encode_localizedInput('title', $request->all());
        $description = Helper::encode_localizedInput('description', $request->all());

        $dua = new Dua();
        $dua->title=$title;
        $dua->description=$description;
        $dua->lang=Session::get('locale')?Session::get('locale'):'en';
        $dua->company_id=Auth::id();
        if($request->file('image')) {
          $fileName = time().'_'.$request->image->getClientOriginalName();
          $request->image->move(public_path('uploads/dua'), $fileName);
          $dua->image=asset('/').'uploads/dua/'.$fileName;
        }
        $dua->save();
        Session::put('success', 'Dua created successfully !');
        return redirect()->route('company.dua');
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }

    public function delete(Request $request,$id){
        if(Dua::find($id)){
          Dua::find($id)->delete();
            Session::put('success', 'Dua deleted successfully !');
            return redirect()->back();
        }else{
            Session::put('error', 'Operation Failed !');
            return redirect()->back();
        }
    }

    public function edit(Request $request,$id)
    {
        $dua=Dua::find($id);
        return view('admin.dua.edit',compact('dua'));
    }

    public function update(Request $request,$id){
      try {
        $title = Helper::encode_localizedInput('title', $request->all());
        $description = Helper::encode_localizedInput('description', $request->all());
        $dua = Dua::find($id);
        $dua->title=$title;
        $dua->description=$description;
        $dua->company_id=Auth::id();
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
        Session::put('success', 'Dua Updated successfully !');
        return redirect()->back();
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }
}
