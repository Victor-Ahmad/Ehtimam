<?php

namespace App\Http\Controllers\Dashboard;



use App\Models\Technician;
use App\Models\User;
use App\Models\Order;
use App\Notifications\SendPushNotification;
use App\Traits\NotificationTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;


class NotificationController extends Controller
{
    use NotificationTrait;
    public function showNotification()
    {
        $type = request()->input('type');
        $gender = request()->input('gender');
        $subjects = User::whereNotNull('fcm_token');

        if (request()->ajax()) {
            if ($type == 'technician') {
                $subjects = Technician::whereNotNull('fcm_token');
            } elseif ($type == 'customersWithNoOrders') {
                $subjects = User::whereNotNull('fcm_token')->doesntHave('orders');
            }

            if ($gender == 'male') {
                $subjects->where('gender', 'male');
            } elseif ($gender == 'female') {
                $subjects->where('gender', 'female');
            }
            $subjects = $subjects->get();

            return response()->json(['subjects' => $subjects]);
        }



        $subjects = $subjects->get();
        return view('dashboard.notification.notification', compact('subjects'));
    }

    public function sendNotification(Request $request)
    {

        $request->validate([
            'customer_id' => 'nullable',
            'subject_id' => 'nullable',
            'title' => 'required',
            'message' => 'required',
            'type' => 'required',
            'gender' => 'require'
        ]);

        if ($request->type == 'customer') {
            if ($request->customer_id == 'all') {
                $FcmTokenArray = User::whereNotNull('fcm_token');
            } else {
                $user = User::where('id', $request->customer_id)->first('fcm_token');
                $FcmToken = $user->fcm_token;
            }

            $type = 'customer';
        } else if ($request->type == 'customersWithNoOrders') {
            if ($request->customer_id == 'all') {
                $FcmTokenArray = User::whereNotNull('fcm_token')->doesntHave('orders')->get()->pluck('fcm_token');
            } else {
                $user = User::where('id', $request->customer_id)->first('fcm_token');
                $FcmToken = $user->fcm_token;
            }
            $type = 'customer';
        } else {
            if ($request->subject_id == 'all') {
                $FcmTokenArray = Technician::whereNotNull('fcm_token')();

                // $FcmTokenArray = $allTechn->pluck('fcm_token');


                // foreach ($allTechn as $tech) {
                //     Notification::send(
                //         $tech,
                //         new SendPushNotification($request->title, $request->message)
                //     );
                // }
            } else {
                $technician = Technician::where('id', $request->subject_id)->first();

                $FcmToken = $technician->fcm_token;

                // Notification::send(
                //     $technician,
                //     new SendPushNotification($request->title, $request->message)
                // );
            }

            $type = 'technician';
        }


        if (isset($FcmToken) && $FcmToken == null) {

            return redirect()->back()->withErrors(['fcm_token' => 'لا يمكن ارسال الاشعارت لعدم توفر رمز الجهاز']);
        } elseif (isset($FcmTokenArray) && count($FcmTokenArray) == 0) {
            return redirect()->back()->withErrors(['fcm_token' => 'لا يمكن ارسال الاشعارت لعدم توفر رمز الجهاز']);
        }

        if (isset($FcmTokenArray) && count($FcmTokenArray) != 0 && $request->gender && $request->gender != 'all') {
            $FcmTokenArray->where('gender', $request->gender);
        }

        $message = str_replace('&nbsp;', ' ', strip_tags($request->message));
        $notification = [
            'device_token' => isset($FcmToken) ? [$FcmToken] : $FcmTokenArray->pluck('fcm_token'),
            'title' => $request->title,
            'message' =>  $message,
            'type' => $type ?? '',
            'code' => 2
        ];

        $this->pushNotification($notification);
        session()->flash('success');
        return redirect()->back();
    }
}
