<?php
namespace App\Helper;
use App\Models\Language;
use App\Models\Notification;
use App\Models\CompanyUser;
use App\Models\User;
use App\Models\Group;
use App;
use Auth;
use Session;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
class Helper
{
    public static function getLanguages(){
        return Language::where('active','1')->get();
    }

    public static function getLanguage($languageId) {
        $language = Language::where('id', $languageId)->first();
        if ($language == null) {
            $language = new Language();
            $language->code = 'en';
            $language->save();
        }

        return $language;
    }
    public static function get_localizedDefault($stringValues, $code = '', $showDefault = false) {
        
        if ($code == null || $code == '') {
            $code = App::getLocale();
            if ($code == null || $code == '') {
                $code = Helper::get_defaultLanguage();
            }
        }
        $jsonValues = json_decode($stringValues, true);
        if (!is_array($jsonValues)) {
            $jsonValues = array();
        }
        $res = (array_key_exists($code, $jsonValues) ? $jsonValues[$code] : '');
        if (($showDefault) && $res == '') {
            $res = Helper::get_localizedDefault($stringValues, 'en');
        }
        return $res;
    }
    public static function get_defaultLanguage() {

        return "en";
    }

    public static function encode_localizedInput($field, $Input) {

        $languageArray = Helper::getLanguages();
        $languages=$languageArray;
        $inputKeys = array();

        for ($i = 0; $i < count($languages); $i++) {
            array_push($inputKeys, $field . "_" . $languages[$i]["code"]);
        }
        $input = Arr::only($Input, $inputKeys);
        $res = json_encode($input);
        for ($i = 0; $i < count($languages); $i++) {
            $res = str_replace($field . "_" . $languages[$i]["code"]
                    , $languages[$i]["code"]
                    , $res);
        }
        return $res;
    }

    
    public static function group_array_by($array, $key) {
        $return = array();
        foreach ($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }

    
    public static function addNotification($from_id, $from_type, $to_id, $to_type, $title, $message) {
        $notification = new Notification();
        $notification->from_id = $from_id;
        $notification->from_type = $from_type;
        $notification->to_id = $to_id;
        $notification->to_type = $to_type;
        $notification->title = $title;
        $notification->message = $message;
        $notification->save();
    }

    public static function addNotificationFromAdmin($to_id, $to_type, $title, $message) {
        $from_id = Auth::id();
        $from_type = "admin";
        Helper::addNotification($from_id, $from_type, $to_id, $to_type, $title, $message);
    }

    public static function addNotificationFromGuide($to_id, $to_type, $title, $message) {
        $from_id = Auth::id();
        $from_type = "guide";
        Helper::addNotification($from_id, $from_type, $to_id, $to_type, $title, $message);
    }

    public static function addNotificationFromUser($to_id, $to_type, $title, $message) {
        $from_id = Auth::id();
        $from_type = "user";
        Helper::addNotification($from_id, $from_type, $to_id, $to_type, $title, $message);
    }
    // public static function get_users_in_groups($groups, $all = false) {
    //     $users = CompanyUser::whereIn('group_id', $groups)->get();
    //     return $users;
    // }
    
      public static function get_users_in_groups($groups, $all = false) {
        // Check if $groups is not null before using it
        if ($groups !== null && is_array($groups) && count($groups) > 0) {
            $users = CompanyUser::whereIn('group_id', $groups)->get();
            return $users;
        } else {
            // Handle the case where $groups is null or empty
            // You can return an empty array or handle it based on your application's logic
            return [];
        }
    }

    public static function get_companies($all = false, $limitedToCompany = -2) {

        $companies = User::Query();
        
        if ($limitedToCompany > 0) {
            $companies = $companies->where('id', $limitedToCompany);
        }

        return $companies->where('type',0)->get();
    }

    public static function get_groups($all = false, $limitedToGroup = -2, $limitedToGuide = -2
    , $limitedToCompany = -2) {
        // $groups = Group::Query();
        // if (!$all) {
        //     $groups = $groups->where('active', '1');
        // } else {
        //     $groups = $groups->where('active', '>=', '0');
        // }
        // if ($limitedToGroup > 0) {
        //     $groups = $groups->where('group.id', $limitedToGroup);
        // }
        // if ($limitedToCompany > 0) {
        //     $groups = $groups->where('company_id', $limitedToCompany);
        // }

        // if ($limitedToGuide > 0) {
        //     $groups = $groups->where('active', '>=', 1)
        //             ->join('guide_group', 'guide_group.group_id', '=', 'group.id')
        //             ->where('guide_group.guide_id', '=', $limitedToGuide);
        // }


        // return $groups->select('group.*')->get();
        return Group::get();
    }


    public static function GetGroupsForDDLCompany($companyId) {

        if ($companyId == null) {
            return [
                "addAll" => false, "list" => []
            ];
        } else if ($companyId == -1) {
            return [
                "addAll" => true, "list" => []
            ];
        } else {
            $groupArray = Helper::get_groups(false, -2, -2, $companyId)->toArray();
            $list = $groupArray;
            $groupArrayCount = (new Collection($groupArray))->count();

            return [
                "list" => $list
            ];
        }
    }

    public static function GetGroupsForDDLGuide($guideId) {

        if ($guideId == null) {
            return [
                "addAll" => false, "list" => []
            ];
        } else if ($guideId == -1) {
            return [
                "addAll" => true, "list" => []
            ];
        } else {

            $groupArray = Helper::get_groups(false, -2, $guideId, -2)->toArray();
            $list = $groupArray;
            $groupArrayCount = (new Collection($groupArray))->count();

            return [
                "list" => $list
            ];
        }
    }

}