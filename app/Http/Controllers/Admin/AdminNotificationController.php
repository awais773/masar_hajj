<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;
use Illuminate\View\View;
use App\Models\Guide;
use App\Models\CompanyUser;
use Session;
use File;
class AdminNotificationController extends Controller
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
        return view('admin.notification.index');
    }

    public function store(Request $request){
        try {
            $title = Helper::encode_localizedInput('title',$request->all());
            $message = Helper::encode_localizedInput('message',$request->all());
            $title_en = Helper::get_localizedDefault($title, 'en');
            $message_en = Helper::get_localizedDefault($message, 'en');
            $selectedguides = $request->selectedguides;
            $selectedgroups = $request->selectedgroups;
            $selectedusers = $request->selectedusers;
            $combined_groups_and_users = [];
            for ($gu = 0; $gu < sizeof($selectedguides); ++$gu) {
                $guide_id = $selectedguides[$gu];
                $guide22 = Guide::find($guide_id);
                $FcmToken2 = $guide22->device_token;
                $url2 = 'https://fcm.googleapis.com/fcm/send';
                $serverKey2 = 'AAAAKOQbcSU:APA91bHq9owWixdJyLu3RtMDAtbSyfW7ALyAymsBNH9XS02p4nJljwUZ_6gdAiwDzjmsQqiWqEjUWF2eIYGvVHqZTJWxds5h6USljZhpodYV9_SNu6mOMk0eKJKQPhtMoks04miFg86G';
                $data2 = [
                    "to" => $FcmToken2,
                    "notification" => [
                        "title" => $title_en,
                        "body" => $message_en,
                    ]
                ];
                $encodedData2 = json_encode($data2);
                $headers2 = [
                    'Authorization:key=' . $serverKey2,
                    'Content-Type: application/json',
                ];
                $ch2 = curl_init();
                curl_setopt($ch2, CURLOPT_URL, $url2);
                curl_setopt($ch2, CURLOPT_POST, true);
                curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch2, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);        
                curl_setopt($ch2, CURLOPT_POSTFIELDS, $encodedData2);
                $result2 = curl_exec($ch2);
                if ($result2 === FALSE) {
                    die('Curl failed: ' . curl_error($ch2));
                }        
                curl_close($ch2);      
                Helper::addNotificationFromAdmin($guide_id, 'guide', $title, $message);
            }
            //Group(s)
            $users_in_groups = Helper::get_users_in_groups($selectedgroups);
            foreach ($users_in_groups as $ug) {
                $user_id = $ug['id'];
                if (!in_array($user_id, $combined_groups_and_users)) {
                    $combined_groups_and_users[] = $user_id;
                }
            }

            for ($u = 0; $u < sizeof($selectedusers); ++$u) {
                $user_id = $selectedusers[$u];
                
                $user22 = CompanyUser::find($user_id);
                $FcmToken = $user22->device_token;
                $url = 'https://fcm.googleapis.com/fcm/send';
                $serverKey = 'AAAAKOQbcSU:APA91bHq9owWixdJyLu3RtMDAtbSyfW7ALyAymsBNH9XS02p4nJljwUZ_6gdAiwDzjmsQqiWqEjUWF2eIYGvVHqZTJWxds5h6USljZhpodYV9_SNu6mOMk0eKJKQPhtMoks04miFg86G';
                $data = [
                    "to" => $FcmToken,
                    "notification" => [
                        "title" => $title_en,
                        "body" => $message_en,
                        
                    ]
                ];
                $encodedData = json_encode($data);
                $headers = [
                    'Authorization:key=' . $serverKey,
                    'Content-Type: application/json',
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
                curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
                $result = curl_exec($ch);
                if ($result === FALSE) {
                    die('Curl failed: ' . curl_error($ch));
                }        
                curl_close($ch);
                    if (!in_array($user_id, $combined_groups_and_users)) {
                        $combined_groups_and_users[] = $user_id;
                    }
            }
            for ($u = 0; $u < sizeof($combined_groups_and_users); ++$u) {
                $userId = $combined_groups_and_users[$u];
                Helper::addNotificationFromAdmin($userId, 'user', $title, $message);
            }

          Session::put('success', 'Notification sent successfully !');
          return redirect()->route('admin.notification');
        } catch (\Throwable $th) {
          Session::put('error', 'Operation Failed !');
          return redirect()->back();
        }
      }

   
}
