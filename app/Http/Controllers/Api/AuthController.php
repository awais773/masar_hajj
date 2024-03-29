<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use App\Models\User;
use App\Models\Group;
use App\Models\Guide;
use App\Helper\Helper;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use App\Models\HajjProcedure;
use App\Models\CustomerLocation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Guid\Guid;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'loginUser', 'loginGuide', 'userLocationEdit', 'addLocation', 'hajjProcedure', 'custom_location','GuideLocationEdit']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        try {
            if (!$token = auth()->guard('api')->attempt($validator->validated())) {
                return response()->json([
                    'error' => 'Invalid Credentials'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Could not create token'
            ], 500);
        }

        return $this->createNewToken($token);
    }


    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = CompanyUser::where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        // Update login status, device token, and language
        $user->update([
            'device_token' => $request->device_token,
            // 'lan' => $request->language,
        ]);
        $language = $request->lang ?? 'en'; // Default to English if language is not specified
        $user->firstname = $this->getLocalizedField($user->firstname, $language);
        $user->lastname = $this->getLocalizedField($user->lastname, $language);

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'user' => $user
        ], 200);
    }

    private function getLocalizedField($field, $language)
    {
        $decodedField = json_decode($field, true);

        // Use the specified language, or default to English
        $localizedValue = $decodedField[$language] ?? $decodedField['en'] ?? null;

        return $localizedValue;
    }


    public function loginGuide(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = Guide::where('username', $request->username)
            ->where('password', $request->password)
            ->first();
         $group_id = $user->id;
         $group = Group::where('id', $group_id)->select('id')->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        // Update login status, device token, and language
        $user->update([
            'device_token' => $request->device_token,
            // 'lan' => $request->language,
        ]);
        $language = $request->lang ?? 'en'; // Default to English if language is not specified
        $user->firstname = $this->getLocalizedField($user->firstname, $language);
        $user->lastname = $this->getLocalizedField($user->lastname, $language);
        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'user' => $user,
            'group' => $group
        ], 200);
    }





    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = new User();
        $name = Helper::encode_localizedInput('name', $request->only('name_en', 'name_ar'));

        $user = new User();
        $user->name = $name;
        $user->email = $request->email;
        $user->temp_password = $request->password;
        $user->type = 0;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'message' => 'Company created successfully',
            'user' => $user
        ], 201);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth('api')->user()
        ]);
    }

    public function userLocationEdit(Request $request, $id)
    {
        $obj = CompanyUser::find($id);
        if ($obj) {
            if (!empty($request->input('latitude'))) {
                $obj->latitude  = $request->input('latitude');
            }
            if (!empty($request->input('longitude'))) {
                $obj->longitude = $request->input('longitude');
            }
            $obj->save();

            $language = $request->lang ?? 'en'; // Default to English if language is not specified
            $obj->firstname = $this->getLocalizedField($obj->firstname, $language);
            $obj->lastname = $this->getLocalizedField($obj->lastname, $language);
        }
        return response()->json([
            'success' => true,
            'message' => 'User is updated successfully',
            'data' => $obj,
        ]);
    }

    public function GuideLocationEdit(Request $request, $id)
    {
        $obj = Guide::find($id);
        if ($obj) {
            if (!empty($request->input('latitude'))) {
                $obj->latitude  = $request->input('latitude');
            }
            if (!empty($request->input('longitude'))) {
                $obj->longitude = $request->input('longitude');
            }
            $obj->save();

            $language = $request->lang ?? 'en'; // Default to English if language is not specified
            $obj->firstname = $this->getLocalizedField($obj->firstname, $language);
            $obj->lastname = $this->getLocalizedField($obj->lastname, $language);
        }
        return response()->json([
            'success' => true,
            'message' => 'Guide is updated successfully',
            'data' => $obj,
        ]);
    }


    public function addLocation(Request $request)
    {
        try {
            // $locationname = Helper::encode_localizedInput('locationname', $request->all());
            $surveyNew = new CustomerLocation();
            // $surveyNew->locationname = $locationname;
            $surveyNew->locationname    = $request->locationname;
            $surveyNew->longitude    = $request->longitude;
            $surveyNew->latitude    = $request->latitude;
            $surveyNew->company_user_id    = $request->company_user_id;
            $surveyNew->type = $request->type;

            if ($file = $request->file('picture')) {
                $video_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $video_full_name = $video_name . '.' . $ext;
                $upload_path = 'LocationAdd/';
                $video_url = $upload_path . $video_full_name;
                $file->move($upload_path, $video_url);
                $surveyNew->picture = $video_url;
            }
            $surveyNew->save();
            return response()->json(['message' => 'Location created successfully !', 'success' => true, 'data' => $surveyNew]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Operation Failed!', 'success' => false, 'code' => 501]);
        }
    }






      public function hajjProcedure(Request $request, $id)
      {
          $duas = HajjProcedure::where('company_id', $id)->paginate(10);
          $language = $request->lang ?? 'en'; // Default to English if language is not specified

          foreach ($duas as $dua) {
              $dua->title = $this->getLocalizedField($dua->title, $language);
              $dua->content = $this->getLocalizedField($dua->content, $language);
              $dua->image = $dua->icon;
              unset($dua->icon);
          }

          return response()->json($duas,200);
      }



      public function  custom_location(Request $request, $id)
      {
          try {
              $customlocations = CustomerLocation::where('company_user_id', $id)->where('type', $request->type)->get();
            //   $language = $request->lang ?? 'en'; // Default to English if language is not specified
            //   $customlocations->customlocation = $this->getLocalizedField($customlocations->customlocation, $language);
              return response()->json(['message' => 'Data found successfully !', 'success' => true, 'data' => $customlocations]);
          }
           catch (\Throwable $th) {
              return response()->json(['message' => $th->getMessage(), 'success' => false, 'status' => 'error', 'code' => 501]);
          }
      }
}

  

