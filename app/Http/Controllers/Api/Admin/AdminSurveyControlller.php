<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;
use Illuminate\View\View;
use App\Models\Survey;
use App\Models\Group;
use Session;
use File;
use DB;
class AdminSurveyControlller extends Controller
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
        $surveys=Survey::get();
        return response()->json(['data' => $surveys, 'status' => 'success',]);
    }


    public function store(Request $request){
      try {
        $question = Helper::encode_localizedInput('question', $request->all());
        $choose = Helper::encode_localizedInput('choose',$request->all());
        $surveyNew = new Survey();
        $surveyNew->question=$question;
        $surveyNew->choices=$choose;
        $surveyNew->group_id=json_encode($request->selectedgroups);
        $surveyNew->save();
        return response()->json(['message' => 'Survey created successfully !', 'status' => 'success',]);
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);

      }
    }

    public function delete(Request $request,$id){
        if(Survey::find($id)){
            Survey::find($id)->delete();
            return response()->json(['message' => 'Survey deleted successfully !', 'status' => 'success',]);
        }else{
          return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);
        }
    }

    public function edit(Request $request,$id)
    {
        $survey=Survey::find($id);
        return response()->json(['date' => $survey, 'status' => 'success']);
    }

    public function update(Request $request,$id){
      try {
        $question = Helper::encode_localizedInput('question',$request->all());
        $choose = Helper::encode_localizedInput('choose',$request->all());
        $surveyUpdate = Survey::find($id);
        $surveyUpdate->question=$question;
        $surveyUpdate->choices=$choose;
        $surveyUpdate->group_id=json_encode($request->selectedgroups);
        $surveyUpdate->save();
        return response()->json(['message' => 'Survey updated successfully !', 'status' => 'success',]);
      } catch (\Throwable $th) {
        return response()->json(['message' => 'Operation Failed !', 'status' => 'error','code'=>501]);

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
      return response()->json(['title' => $title,'surveys'=>$surveys,'countdata'=>$countdata,'labeldata'=>$labeldata,'status' => 'success']);
  }
    //   survey code
    // public function survey(Request $request, $id)
    // {

    //     $company_id = $request->input('company_id');
    //     $survey = Survey::where('company_id', $company_id)
    //         ->get();

    //     if ($survey) {
    //         return response()->json(['data' => $survey, 'success' => true]);

    //     } else {
    //         return response()->json(['data' => $survey, 'success' => false]);
    //     }
    // }


}


