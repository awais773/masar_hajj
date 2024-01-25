<?php

namespace App\Http\Controllers\Api\Admin;

use Session;
use App\Models\User;
use App\Models\Group;
use App\Models\Guide;
use App\Helper\Helper;
use App\Models\Survey;
use Illuminate\View\View;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use App\Models\CustomerLocation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{



    public function survey(Request $request, $id)
    {


        $surveys = Survey::where('company_id', $id)->get();

        $language = $request->lang ?? 'en'; // Default to English if language is not specified
        foreach ($surveys as $survey) {
            $survey->question = $this->getLocalizedField($survey->question, $language);
            $survey->choices = $this->getLocalizedField($survey->choices, $language);
        }


        if ($surveys->count() > 0) {
            return response()->json([
                'success' => true,
                'message' => 'Successfully fetched surveys',
                'data' => $surveys,
            ]);
        } else {
            // return response()->json(['data' => $survey, 'success' => false]);
            return response()->json(['message' => 'Operation Failed !', 'status' => 'error', 'code' => 501]);
        }
    }


    private function getLocalizedField($field, $language)
    {
        $decodedField = json_decode($field, true);

        // Use the specified language, or default to English
        $localizedValue = $decodedField[$language] ?? $decodedField['en'] ?? null;

        return $localizedValue;
    }


    // Company User PAssword
    public function  user_update_password(Request $request, $id)
    {
        try {
            $company_users = CompanyUser::find($id);
            $company_users->password = $request->password;
            $company_users->save();
            return response()->json(['message' => 'Password updated successfully !', 'success' => true, 'data' => $company_users,]);
        } catch (\Throwable $th) {
            return response()->json(['message' => ' Password ID is not found', 'success' => false, 'status' => 'error', 'code' => 501]);
        }
    }

    //  Guide User Password
    public function guide_update_password(Request $request, $id)
    {
        try {
            $guides = Guide::find($id);
            $guides->password = $request->password;
            $guides->save();
            // dd($guides);
            return response()->json(['message' => 'Password updated successfully !', 'success' => true, 'data' => $guides,]);
        } catch (\Throwable $th) {
            return response()->json(['message' => ' Password ID is not found', 'success' => false, 'status' => 'error', 'code' => 501]);
        }
    }

    //Guide get ID
    public function guide_get(Request $request, $id)
    {
        try {
            $guides = Guide::where('id', $id)->first();
            return response()->json(['message' => 'Data found successfully !', 'success' => true, 'data' => $guides,]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Object is not found', 'success' => false, 'status' => 'error', 'code' => 501]);
        }
    }

    //Company get IDguide_update_image
    public function company_get(Request $request, $id)
    {
        try {
            $company_users = CompanyUser::where('id', $id)->first();
            return response()->json(['message' => 'Data found successfully !', 'success' => true, 'data' => $company_users,]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Object is not found', 'success' => false, 'status' => 'error', 'code' => 501]);
        }
    }

    //  Guide Update Image
    public function guide_update_image(Request $request, $id)
    {
        try {
            $guides = Guide::find($id);
            if ($file = $request->file('picture')) {
                $video_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $video_full_name = $video_name . '.' . $ext;
                $upload_path = 'guideImage/';
                $video_url = $upload_path . $video_full_name;
                $file->move($upload_path, $video_url);
                $guides->picture = $video_url;
            }
            $guides->save();
            return response()->json(['message' => 'Image updated successfully !', 'success' => true, 'data' => $guides,]);
        } catch (\Throwable $th) {
            return response()->json(['message' => ' Image is not found', 'success' => false, 'status' => 'error', 'code' => 501]);
        }
    }
    //  Company Update Image
    public function user_update_image(Request $request, $id)
    {
        try {
            $company_users = CompanyUser::find($id);
            if ($file = $request->file('picture')) {
                $video_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $video_full_name = $video_name . '.' . $ext;
                $upload_path = 'userImage/';
                $video_url = $upload_path . $video_full_name;
                $file->move($upload_path, $video_url);
                $company_users->picture = $video_url;
            }
            $company_users->save();
            return response()->json(['message' => 'Image updated successfully !', 'success' => true, 'data' => $company_users,]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Image is not found', 'success' => false, 'status' => 'error', 'code' => 501]);
        }
    }

    //Company User Group ID
    public function guide_id_user(Request $request, $groupId)
    {
        try {
            //  For array index value
            $company_users = CompanyUser::whereJsonContains('group_id', $groupId[0])->get();
            $language = $request->lang ?? 'en'; // Default to English if language is not specified
            foreach ($company_users as $company_user) {
                $company_user->firstname = $this->getLocalizedField($company_user->firstname, $language);
                $company_user->lastname = $this->getLocalizedField($company_user->lastname, $language);
            }

            return response()->json(['message' => 'Data found successfully !', 'success' => true, 'data' => $company_users,]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Object is not found', 'success' => false, 'status' => 'error', 'code' => 501]);
        }
    }
    //Group Member
    public function group_member(Request $request)
    {
        try {


            $group_id = request('group_id');
            $user_id = request('user_id');
            $company_users = CompanyUser::whereJsonContains('group_id', $group_id[0])->where('id', '!=', $user_id)->get();
            $language = $request->lang ?? 'en'; // Default to English if language is not specified
            foreach ($company_users as $company_user) {
                $company_user->firstname = $this->getLocalizedField($company_user->firstname, $language);
                $company_user->lastname = $this->getLocalizedField($company_user->lastname, $language);
            }


            $guideid = Group::find($group_id)->guide_id;
            $guide = Guide::find($guideid);
            $guide->firstname = $this->getLocalizedField($guide->firstname, $language);
            $guide->lastname = $this->getLocalizedField($guide->lastname, $language);

            return response()->json([
                'message' => 'Data found successfully !', 'success' => true, 'data' => $company_users,
                'guide' => $guide
            ]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false, 'status' => 'error', 'code' => 501]);
        }
    }
    //Survey Submit
    // public function survey_submit(Request $request, $id)
    // {
    //     try {
    //         $survey_submit
    //             = Survey::where('user_id', $id)->first();


    //         return response()->json([
    //             'message' => 'Data found successfully !', 'success' => true, 'data' =>
    //             $survey_submit

    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json(['message' => $th->getMessage(), 'success' => false, 'status' => 'error', 'code' => 501]);
    //     }
    // }

    //  Guide User According Company id
    public function guide_user(Request $request, $id)
    {
        try {
            $guides = Guide::where('company_id',$id)->first();

            return response()->json(['message' => 'Comapny Id found successfully !', 'success' => true, 'data' => $guides,]);
        } catch (\Throwable $th) {
            return response()->json(['message' => ' Company ID is not found', 'success' => false, 'status' => 'error', 'code' => 501]);
        }
    }

//    Customer Location Delete Api
    public function custom_location_del($id)
    {
        $customlocations = CustomerLocation::find($id);

        if (!$customlocations) {
            return response()->json(['message' => 'Customer not found', 'success' => false, 'status' => 'error', 'code' => 404]);
        }

        $data = $customlocations->delete();

        if ($data) {
            return response()->json([
                'message' => 'Customer Delete Successfully',
                'success' => true,
            ]);
        } else {
            return response()->json([
                'message' => 'Operation Failed !',
                'success' => false,
                'status' => 'error',
                'code' => 501,
                'error' => 'Deletion failed'
            ]);
        }
    }

    // Search Api
    function search_user($name){
        return CompanyUser::where("username","like","%".$name."%")->get();

    }


   
public function surveySubmit(Request $request)
{
    $isAPI = ($request->segment(1) == 'api');

    if ($isAPI) {
        $rules = [
            'lang' => 'required',
            'survey_id_choice' => 'required',
            'user_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages(),
            ], 401);
        }

        $user_id = $request->input('user_id');
        $lang = $request->input('lang');
        $survey_id_choice = $request->input('survey_id_choice');

        // Delete the previous survey answers submitted by user id
        DB::table('survey_submit')->where('user_id', $user_id)->delete();

        $sy_cho = explode(',', $survey_id_choice);

        foreach ($sy_cho as $cat) {
            $cat = trim($cat);
            $st2 = explode(":", $cat);
            $survey_id = $st2[0];
            $choice = $st2[1];

            DB::table('survey_submit')->insert([
                'survey_id' => $survey_id,
                'choice' => $choice,
                'user_id' => $user_id,
                'lang' => $lang,
            ]);
        }

        return response()->json([
            'message' => 'success',
            'SurveySubmit' => $sy_cho,
        ], 200);
    } else {
        return response()->json([
            'message' => 'error',
            'msg' => 'nothing found',
        ]);
    }
}
    
    

}
