<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Group;
use App\Helper\Helper;
use App\Models\Survey;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AdminSurveyControlller extends Controller
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
      
        $surveys=Survey::with('company')->where('company_id',Auth::id())->latest('id')->get();
       
        return view('admin.survey.index',compact('surveys'));
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(): View
    {
        return view('admin.survey.create');
    }

    public function store(Request $request){
      try {
        $question = Helper::encode_localizedInput('question',$request->all());
        $choose = Helper::encode_localizedInput('choose',$request->all());
        $surveyNew = new Survey();
        $surveyNew->question=$question;
        $surveyNew->choices=$choose;
        $surveyNew->company_id=Auth::id();
        $surveyNew->group_id=json_encode($request->selectedgroups);
        $surveyNew->save();
        Session::put('success', 'Survey created successfully !');
        return redirect()->route('company.survey');
      } catch (\Throwable $th) {
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }

    public function delete(Request $request,$id){
        if(Survey::find($id)){
            Survey::find($id)->delete();
            Session::put('success', 'Survey deleted successfully !');
            return redirect()->back();
        }else{
            Session::put('error', 'Operation Failed !');
            return redirect()->back();
        }
    }

    public function edit(Request $request,$id)
    {
        $survey=Survey::find($id);
        return view('admin.survey.edit',compact('survey'));
    }

    public function update(Request $request,$id){
      try {
        $question = Helper::encode_localizedInput('question',$request->all());
        $choose = Helper::encode_localizedInput('choose',$request->all());
        $surveyUpdate = Survey::find($id);
        $surveyUpdate->question=$question;
        $surveyUpdate->choices=$choose;
        $surveyUpdate->company_id=Auth::id();
        $surveyUpdate->group_id=json_encode($request->selectedgroups);
        $surveyUpdate->save();
        Session::put('success', 'Survey updated successfully !');
        return redirect()->back();
      } catch (\Throwable $th) {
        dd($th->getMessage());
        Session::put('error', 'Operation Failed !');
        return redirect()->back();
      }
    }
    public function survayDetail($id){
      $surveys = Survey::find($id);
      $title = ucwords(trans('admin.survey'));
      $chartdata =DB::table('survey_submit')
              ->selectRaw('count(choice) as total,choice')
              ->groupBy('choice')
              ->where('survey_id',$id)
              ->get();
      $tempArrayLabel=[];
      $tempArrayCount=[];
      foreach($chartdata as $chart){
          $tempArrayLabel[]=$chart->choice;
          $tempArrayCount[]=$chart->total;
      }
      $labeldata=json_encode($tempArrayLabel);
      $countdata=json_encode($tempArrayCount);
     
      return view('admin.survey.detail',compact('title','surveys','countdata','labeldata'));
  }
}


