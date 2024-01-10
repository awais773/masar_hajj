<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\User;
use App\Models\CompanyUser;
use App\Models\Group;
use App\Helper\Helper;
class CommanController extends Controller
{
    // for map view
    public function groups_users_location_xml(Request $request) {

       
        $company_id = $request->company_id;
        $group_id = $request->group_id;
        $company_id = ($company_id != null) ? $company_id : -2;
        $group_id = ($group_id != null) ? $group_id : -2;
        $guide_id = $request->guide_id;
        $user_id = $request->user_id;
        $guide_id = ($guide_id != null) ? $guide_id : -2;
        $user_id = ($user_id != null) ? $user_id : -2;
        $_user = null;
        $groups = [];

        if ($user_id > 0) {
            $_user = CompanyUser::get();

            if ($_user != null) {
                $groups = Helper::get_groups(false, $_user->group_id, -2, $company_id);
            }
        } else {

            $groups = Helper::get_groups(false, $group_id, $guide_id, $company_id);
        }
   
        $response_arr = array();
        $groups_ids = array();
        foreach ($groups as $group) {

            if ($_user != null && ($_user->group_id != $group->id)) {
                continue;
            }
            array_push($groups_ids, $group->id);

            $myObj = (object) array(
                        "name" => Helper::get_localizedDefault($group->name),
                        "group_name" => Helper::get_localizedDefault($group->name),
                        "lat" => $group->latitude,
                        "lng" => $group->longitude,
                        "id" => $group->id,
                        "type" => "group"
            );
            array_push($response_arr, $myObj);

            $users = CompanyUser::get();
            foreach ($users as $user) {
                $grou_name = "";
                $grou_name = Helper::get_localizedDefault($user->group->name);
                array_push($groups_ids, $group->id);

                $myObj = (object) array(
                            "name" =>  Helper::get_localizedDefault($user->firstname) . ' ' . Helper::get_localizedDefault($user->lastname),
                            "group_name" => $grou_name,
                            "lat" => $user->latitude,
                            "lng" => $user->longitude,
                            "id" => $user->id,
                            "type" => "user"
                );
                array_push($response_arr, $myObj);
            }
        }
       return response()->json($response_arr,200);
    }

    
    public function update_groups_users_loc(Request $request) {

        $id = $request->id;
        $type = $request->type;
        $lat = $request->lat;
        $lng = $request->lng;

        if ($type == "user") {
            $user = User::find($id);
            if ($user != null) {
                $user->latitude = $lat;
                $user->longitude = $lng;
                $user->save();
            }
        }
        if ($type == "group") {
            $group = Group::find($id);
            if ($group != null) {
                $group->latitude = $lat;
                $group->longitude = $lng;
                $group->save();
            }
        }
        
            return response()->json("", 200);
    }

    public function GetGroupsForDDL(Request $request) {
        $company = $request->company;
        $guide = $request->guide;
        $selectedGroup = $request->selectedGroup;
        $addNone = false;
        $addAll = $request->addAll;
        $nameExt = $request->nameExt;

        if (isset($request["addNone"])) {
            $addNone = $request["addNone"];
        }
        if (isset($request["nameExt"])) {
            $nameExt = $request["nameExt"];
        }
        if (isset($company)) {
            if ($company == -2) {
                return view('comman.get-company-groups',compact('group_array','addNone','addAll','nameExt'));
            } else {
                $groups = Group::where('company_id',$company)->get();
                $group_array = $groups;
            }
        }
        if (isset($guide)) {
            if ($guide == -2) {
                $group_array=[];
                $addNone=true;
                $addAll=false;
                return view('comman.get-company-groups',compact('group_array','addNone','addAll','nameExt'));
            } else {
                $groups = Helper::GetGroupsForDDLGuide($guide);
                $group_array = $groups["list"];
            }
        }
        return view('comman.get-comapny-groups')
                        ->with('group_array', $group_array)
                        ->with('addNone', $addNone)
                        ->with('addAll', $addAll)
                        ->with('selectedGroup', $selectedGroup)
                        ->with('nameExt', $nameExt);
    }

}
