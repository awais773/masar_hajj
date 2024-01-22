<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CompanyUser;
use Illuminate\View\View;
use App\Models\Survey;
use App\Models\Guide;
use App\Helper\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

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
            return response()->json(['message' => 'Password updated successfully !', 'success'=>true, 'data' => $company_users,]);
        } catch (\Throwable $th) {
            return response()->json(['message' => ' Password ID is not found','success'=>false, 'status' => 'error', 'code' => 501]);
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
            $guides = Guide::where('id',$id)->first();
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
    
}
