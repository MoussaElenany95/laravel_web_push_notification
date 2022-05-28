<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WebNotificationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }

    public function storeToken(Request $request)
    {
       
        auth()->user()->loginDevices()->create(['device_key' => $request->token]);
        return response()->json([$request->token]);
    }

    public function sendWebNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = auth()->user()->loginDevices()->whereNotNull('device_key')->pluck('device_key')->all();
        $serverKey = 'AAAArkoSrk4:APA91bFnxWqsGmMiZvWW8tWaI-qUSRDWdUYmRRKRdxRECI5HpvJH6Ur5cMvvTqcLEN1LoKjdY3wzaFEorLnpvb6fCObjH3YD_OfA0AhXaT2JsCalrBzF1W3OoZ4AI9wpXpKZUiuAB0Jr';

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => "fdsfdsfsdf",
                "body" => "fdsfdsfdsfsdfsdf",
                "sound" => "default"
            ],
            "data" =>[
                "type" => "orders",
                "order_id" => "10"
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
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response
        dd($result);
    }
}
