<?php

namespace App\Http\Controllers\Api\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\Cart;
use App\Models\Contract;
use App\Models\CustomerWallet;
use App\Models\Group;
use App\Models\Order;
use App\Models\OrderService;
use App\Models\Service;
use App\Models\Technician;
use App\Models\Transaction;
use App\Models\UserAddresses;
use App\Models\CategoryGroup;
use App\Models\Visit;
use App\Notifications\SendPushNotification;
use App\Support\Api\ApiResponse;
use App\Traits\imageTrait;
use App\Traits\NotificationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;


class CheckoutController extends Controller
{
    use ApiResponse, imageTrait, NotificationTrait;

    public function __construct()
    {
        $this->middleware('localization');
    }

    protected function checkout(Request $request)
    {
        // $rules = [
        //     'user_address_id' => 'required|exists:user_addresses,id',
        //     'car_user_id' => 'required|exists:car_clients,id',
        //     'payment_method' => 'required|in:cache,visa,wallet',
        //     'coupon' => 'nullable|numeric',
        //     'transaction_id' => 'nullable',
        //     'notes' => 'nullable',
        //     'wallet_discounts' => 'nullable|numeric',
        //     'file' => 'nullable',
        //     'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
        //     'partial_amount' => 'nullable',
        // ];
        $rules = [
            'user_address_id' => 'required|exists:user_addresses,id',
         //   'car_user_id' => 'required|exists:car_clients,id',
            'payment_method' => 'required|in:cache,visa,wallet',

            'coupon' => 'nullable|numeric',
            'transaction_id' => 'nullable',
            'wallet_discounts' => 'nullable|numeric',
            //   'is_advance' => 'nullable',
            // 'is_return' => 'nullable',
            'amount' => 'nullable|numeric',
            'file' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'notes' => 'nullable',
        ];
        $request->validate($rules, $request->all());
        $user = auth()->user('sanctum');
        $carts = Cart::query()->where('user_id', $user->id)->get();


        if (!$carts->first()) {
            return self::apiResponse(400, t_('Cart is empty'), []);
        }


        if ($carts->first()->type == 'package') {
            $total = $carts->first()->price;
            if ($request->payment_method == 'wallet' && $total > $user->point) {
                return self::apiResponse(400, __('api.Your wallet balance is not enough to complete this process'), []);
            }
            return $this->saveContract($user, $request, $total, $carts);
        } else {
            if ($request->payment_method == 'wallet' && $request->amount > $user->point) {
                return self::apiResponse(400, __('api.Your wallet balance is not enough to complete this process'), []);
            }
            $uploadImage = null;
            if ($request->image && $request->image != null) {
                $image = $this->storeImages($request->image, 'order');
                $uploadImage = 'storage/images/order' . '/' . $image;
            }
            $uploadFile = null;
            if ($request->file && $request->file != null) {
                $file = $this->storeImages($request->file, 'order');
                $uploadFile = 'storage/images/order' . '/' . $file;
            }
            $total = $this->calc_total($carts);
            return $this->saveOrder($user, $request, $total, $carts, $uploadImage, $uploadFile);
        }
    }

    private function calc_total($carts)
    {
        $total = [];
        for ($i = 0; $i < $carts->count(); $i++) {
            $cart_total = ($carts[$i]->price) * $carts[$i]->quantity;
            $total[] = $cart_total;
        }
        return array_sum($total);
    }

    private function saveOrder($user, $request, $total, $carts, $uploadImage, $uploadFile)
    {
        $totalAfterDiscount = ($total - $request->coupon);
        $order = Order::create([
            'user_id' => $user->id,
            'discount' => $request->coupon,
            'user_address_id' => $request->user_address_id,
            'sub_total' => $total,
            'total' => $totalAfterDiscount,

            'partial_amount' => ($totalAfterDiscount - $request->amount),
            'status_id' => 2,
            //  'is_advance' => $request->is_advance,
            //  'is_return' => $request->is_return,
            'file' => $uploadFile,
            'image' => $uploadImage,
            'notes' => $request->notes,
       //     'car_user_id' => $request->car_user_id,
        ]);
        // $order = Order::create([
        //     'user_id' => $user->id,
        //     'discount' => $request->coupon,
        //     'user_address_id' => $request->user_address_id,
        //     'sub_total' => $total,
        //     'total' => ($total - $request->coupon),
        //     'payment_status' => $request->payment_status,
        //     'payment_method' => $request->payment_method,
        //     'status_id' => 2,
        //     'file' => $uploadFile,
        //     'image' => $uploadImage,
        //     'car_user_id' => $request->car_user_id,
        //     'notes'=> $request->notes
        // ]);
        foreach ($carts as $cart) {
            OrderService::create([
                'order_id' => $order->id,
                'service_id' => $cart->service_id,
                'price' => $cart->price,
                'quantity' => $cart->quantity,
                'category_id' => $cart->category_id,
            ]);
            $service = Service::query()->find($cart->service_id);
            $service?->save();
        }
        $category_ids = $carts->pluck('category_id')->toArray();
        $category_ids = array_unique($category_ids);
        foreach ($category_ids as $key => $category_id) {

            $cart = Cart::query()->where('user_id', auth('sanctum')->user()->id)
                ->where('category_id', $category_id)->first();
            $booking_no = 'dash2023/' . $cart->id;
            $minutes = 0;
            $bookSetting = BookingSetting::where('service_id', $cart->service_id)->first();
            if ($bookSetting) {
                foreach (Service::with('BookingSetting')->whereIn('id', $carts->pluck('service_id')->toArray())->get() as $service) {
                    $serviceMinutes = ($service->BookingSetting->buffering_time + $service->BookingSetting->service_duration)
                        * $carts->where('service_id', $service->id)->first()->quantity;
                    $minutes += $serviceMinutes;
                }
            }





            $address = UserAddresses::where('id', $order->user_address_id)->first();
            // $booking_id = Booking::whereHas('address',function ($qu) use($address){
            //     $qu->where('region_id',$address->region_id);
            // })->where('date',$cart->date)->pluck('id')->toArray();
            $booking_id = Booking::whereHas('address', function ($qu) use ($address) {
                $qu->where('region_id', $address->region_id);
            })->whereHas('category', function ($qu) use ($category_id) {
                $qu->where('category_id', $category_id);
            })->where('date', $cart->date)->pluck('id')->toArray();
            $visit = DB::table('visits')
                ->select('*', DB::raw('COUNT(assign_to_id) as group_id'))
                ->whereIn('booking_id', $booking_id)
                ->groupBy('assign_to_id')
                ->orderBy('group_id', 'ASC');


            // if ($visit == null){
            //     $group = Group::whereHas('regions',function($qu) use($address) {
            //         $qu->where('region_id',$address->region_id);
            //     })->where('active',1)->first();
            //     $assign_to_id = $group->id;
            // }else{
            //     $assign_to_id = $visit->assign_to_id;
            // }
            $assign_to_id = 0;
            if ($visit->get()->isEmpty()) {
                $groupIds = CategoryGroup::where('category_id', $category_id)->pluck('group_id')->toArray();
                $group = Group::where('active', 1)->whereHas('regions', function ($qu) use ($address) {
                    $qu->where('region_id', $address->region_id);
                })->whereIn('id', $groupIds)->inRandomOrder()->first();
                if ($group == null) {
                    return self::apiResponse(400, __('api.There is a category for which there are currently no technical groups available'), $this->body);
                }
                $assign_to_id = $group->id;
            } else {
                $groupIds = CategoryGroup::where('category_id', $category_id)->pluck('group_id')->toArray();
                $group = Group::where('active', 1)->whereHas('regions', function ($qu) use ($address) {
                    $qu->where('region_id', $address->region_id);
                })->whereIn('id', $groupIds);
                if ($group->count() == 0) {
                    return self::apiResponse(400, __('api.There is a category for which there are currently no technical groups available'), $this->body);
                }
                if (($visit->get()->count()) < ($group->get()->count())) {
                    $assign_to_id = $group->whereNotIn('id', $visit->pluck('assign_to_id')->toArray())->inRandomOrder()->first()->id;
                } else {
                    $assign_to_id = $visit->where('start_time', '!=', $cart->time)->inRandomOrder()->first()->assign_to_id;
                }
            }
            $bookingInsert = Booking::query()->create([
                'booking_no' => $booking_no,
                'user_id' => auth('sanctum')->user()->id,
                'category_id' => $category_id,
                'order_id' => $order->id,
                'service_id' => $cart->service_id,
                'user_address_id' => $order->user_address_id,
                'booking_status_id' => 1,
                'notes' => $cart->notes,
                'quantity' => $cart->quantity,
                'date' => $cart->date,
                'type' => 'service',
                'time' => Carbon::parse($cart->time)->toTimeString(),
                'end_time' => $minutes ? Carbon::parse($cart->time)->addMinutes($minutes)->toTimeString() : null,
            ]);

            $start_time = Carbon::parse($cart->time)->toTimeString();
            $end_time =  $minutes ? Carbon::parse($cart->time)->addMinutes($minutes)->toTimeString() : null;
            $validated['start_time'] =  $start_time;
            $validated['end_time'] = $end_time;
            $validated['duration'] = $minutes;
            $validated['visite_id'] = rand(1111, 9999) . '_' . date('Ymd');
            $validated['assign_to_id'] = $assign_to_id;
            $validated['booking_id'] = $bookingInsert->id;
            $validated['visits_status_id'] = 1;
            $visitInsert = Visit::query()->create($validated);



            $allTechn = Technician::where('group_id', $assign_to_id)->whereNotNull('fcm_token')->get();

            if (count($allTechn) > 0) {

                $title = 'موعد زيارة جديد';
                $message = 'لديك موعد زياره جديد';

                foreach ($allTechn as $tech) {
                    Notification::send(
                        $tech,
                        new SendPushNotification($title, $message)
                    );
                }

                $FcmTokenArray = $allTechn->pluck('fcm_token');

                $notification = [
                    'device_token' => $FcmTokenArray,
                    'title' => $title,
                    'message' => $message,
                    'type' => 'technician',
                    'code' => 1,
                ];

                $this->pushNotification($notification);
            }
        }
        // if ($request->payment_method == 'cache') {
        //     $transaction = Transaction::create([
        //         'order_id' => $order->id,
        //         'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
        //         'payment_result' => 'success',
        //     ]);

        //     $order->update([
        //         'partial_amount'=>$total
        //     ]);

        // } elseif ($request->payment_method == 'wallet'){
        //     $transaction = Transaction::create([
        //         'order_id' => $order->id,
        //         'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
        //         'payment_result' => 'success',
        //     ]);
        // }else {
        //     Transaction::create([
        //         'order_id' => $order->id,
        //         'transaction_number' => $request->transaction_id,
        //         'payment_result' => 'success',
        //     ]);
        // }
        if ($request->payment_method == 'wallet') {
            $transaction = Transaction::create([
                'order_id' => $order->id,
                'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
                'payment_result' => 'success',
                'payment_method' => $request->payment_method,
            ]);
            Order::where('id', $order->id)->update(array('partial_amount' => 0));
        
        } elseif ($request->payment_method == 'cache') {
            $transaction = Transaction::create([
                'order_id' => $order->id,
                'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
                'payment_result' => 'success',
                'payment_method' => $request->payment_method,
            ]);
            Order::where('id', $order->id)->update(array('partial_amount' => $total));
          
        } else {
            Transaction::create([
                'order_id' => $order->id,
                'transaction_number' => $request->transaction_id,
                'payment_result' => 'success',
                'payment_method' => $request->payment_method,
                // 'amount' => $request->amount,
            ]);
            Order::where('id', $order->id)->update(array('partial_amount' => 0));
        }

        $user->update([
            'point' => $user->point - $request->wallet_discounts ?? 0
        ]);

        $this->wallet($user, $total);
   
        Cart::query()->whereIn('id', $carts->pluck('id'))->delete();
        $this->body['order_id'] = $order->id;
        dd(Order::where('id', $order->id)->get());
        return self::apiResponse(200, __('api.order created successfully'), $this->body);
    }

    private function saveContract($user, $request, $total, $carts)
    {
        $contract_order = Contract::create([
            'user_id' => $user->id,
            'discount' => $request->coupon,
            'user_address_id' => $request->user_address_id,
            'sub_total' => $total,
            'total' => ($total - $request->coupon),
            'payment_method' => $request->payment_method,
            'status_id' => 2,
            'package_id' => $carts->first()->contract_package_id,
            'price' => ($total - $request->coupon),
            'quantity' => $carts->count(),
        ]);
        $order = Order::create([
            'user_id' => $user->id,
            'discount' => $request->coupon,
            'user_address_id' => $request->user_address_id,
            'sub_total' => $total,
            'total' => ($total - $request->coupon),
            'status_id' => 2,
            'notes' => $request->notes,
      //      'car_user_id' => $request->car_user_id,
        ]);

        ///////////////////////////////////

        foreach ($carts as $key => $cart) {
            OrderService::create([
                'order_id' => $order->id,
                'service_id' => $cart->service_id,
                'price' => $cart->price,
                'quantity' => $cart->quantity,
                'category_id' => $cart->category_id,
            ]);




            $service = Service::query()->find($cart->service_id);
            $service?->save();
            $category_id = $cart->category_id;
            $booking_no = 'dash2023/' . $cart->id;
            $minutes = 0;
            $bookSetting = BookingSetting::where('service_id', $cart->service_id)->first();
            if ($bookSetting) {
                $minutes =  ($service->BookingSetting->buffering_time + $service->BookingSetting->service_duration);
            }

            $address = UserAddresses::where('id', $order->user_address_id)->first();

            $booking_id = Booking::whereHas('address', function ($qu) use ($address) {
                $qu->where('region_id', $address->region_id);
            })->whereHas('category', function ($qu) use ($category_id) {
                $qu->where('category_id', $category_id);
            })->where('date', $cart->date)->pluck('id')->toArray();
            $visit = DB::table('visits')
                ->select('*', DB::raw('COUNT(assign_to_id) as group_id'))
                ->whereIn('booking_id', $booking_id)
                ->groupBy('assign_to_id')
                ->orderBy('group_id', 'ASC');

            $assign_to_id = 0;
            if ($visit->get()->isEmpty()) {
                $groupIds = CategoryGroup::where('category_id', $category_id)->pluck('group_id')->toArray();
                $group = Group::where('active', 1)->whereHas('regions', function ($qu) use ($address) {
                    $qu->where('region_id', $address->region_id);
                })->whereIn('id', $groupIds)->inRandomOrder()->first();
                if ($group == null) {
                    return self::apiResponse(400, __('api.There is a category for which there are currently no technical groups available'), $this->body);
                }
                $assign_to_id = $group->id;
            } else {
                $groupIds = CategoryGroup::where('category_id', $category_id)->pluck('group_id')->toArray();
                $group = Group::where('active', 1)->whereHas('regions', function ($qu) use ($address) {
                    $qu->where('region_id', $address->region_id);
                })->whereIn('id', $groupIds);
                if ($group->count() == 0) {
                    return self::apiResponse(400, __('api.There is a category for which there are currently no technical groups available'), $this->body);
                }

                if (($visit->get()->count()) < ($group->get()->count())) {
                    $assign_to_id = $group->whereNotIn('id', $visit->pluck('assign_to_id')->toArray())->inRandomOrder()->first()->id;
                } else {

                    $assign_to_id = $visit->where('start_time', '!=', $cart->time)->inRandomOrder()->first()->assign_to_id;
                }
            }
            $bookingInsert = Booking::query()->create([
                'booking_no' => $booking_no,
                'user_id' => auth('sanctum')->user()->id,
                'category_id' => $category_id,
                'service_id' => $cart->service_id,
                'package_id' => $cart->contract_package_id,
                'order_id' => $order->id,
                'contract_order_id' => $contract_order->id,
                'user_address_id' => $order->user_address_id,
                'booking_status_id' => 1,
                'notes' => $cart->notes,
                'quantity' => $cart->quantity,
                'date' => $cart->date,
                'type' => 'contract',
                'time' => Carbon::parse($cart->time)->toTimeString(),
                'end_time' => $minutes ? Carbon::parse($cart->time)->addMinutes($minutes)->toTimeString() : null,
            ]);

            $start_time = Carbon::parse($cart->time)->toTimeString();
            $end_time =  $minutes ? Carbon::parse($cart->time)->addMinutes($minutes)->toTimeString() : null;
            $validated['start_time'] =  $start_time;
            $validated['end_time'] = $end_time;
            $validated['duration'] = $minutes;
            $validated['visite_id'] = rand(1111, 9999) . '_' . date('Ymd');
            $validated['assign_to_id'] = $assign_to_id;
            $validated['booking_id'] = $bookingInsert->id;
            $validated['visits_status_id'] = 1;
            $visitInsert = Visit::query()->create($validated);



            $allTechn = Technician::where('group_id', $assign_to_id)->whereNotNull('fcm_token')->get();

            if (count($allTechn) > 0) {

                $title = 'موعد زيارة جديد';
                $message = 'لديك موعد زياره جديد';

                foreach ($allTechn as $tech) {
                    Notification::send(
                        $tech,
                        new SendPushNotification($title, $message)
                    );
                }

                $FcmTokenArray = $allTechn->pluck('fcm_token');

                $notification = [
                    'device_token' => $FcmTokenArray,
                    'title' => $title,
                    'message' => $message,
                    'type' => 'technician',
                    'code' => 1,
                ];

                $this->pushNotification($notification);
            }
        }
        /////////////////////////////////////////

        // foreach ($carts as $cart) {

        //     $booking_no = 'dash2023/' . $cart->id;
        //     $minutes = 0;
        //     foreach (Service::with('BookingSetting')->whereIn('id', $carts->pluck('service_id')->toArray())->get() as $service) {
        //         $serviceMinutes = ($service->BookingSetting->buffering_time + $service->BookingSetting->service_duration);
        //         $minutes += $serviceMinutes;
        //     }

        //     Booking::query()->create([
        //         'booking_no' => $booking_no,
        //         'user_id' => auth('sanctum')->user()->id,
        //         'category_id' => $cart->category_id,
        //         'contract_order_id' => $order->id,
        //         'user_address_id' => $order->user_address_id,
        //         'booking_status_id' => 1,
        //         'notes' => $cart->notes,
        //         'quantity' => 1,
        //         'package_id' => $cart->contract_package_id,
        //         'date' => $cart->date,
        //         'type' => 'contract',
        //         'time' => Carbon::parse($cart->time)->toTimeString(),
        //         'end_time' => Carbon::parse($cart->time)->addMinutes($minutes)->toTimeString(),
        //     ]);
        // }
        // if ($request->payment_method == 'cache') {
        //     $transaction = Transaction::create([
        //         'contract_order_id' => $order->id,
        //         'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
        //         'payment_result' => 'success',
        //     ]);

        //     $order->update([
        //         'partial_amount'=>$total
        //     ]);

        // }elseif ($request->payment_method == 'wallet'){
        //     $transaction = Transaction::create([
        //         'contract_order_id' => $order->id,
        //         'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
        //         'payment_result' => 'success',
        //     ]);
        // } else {
        //     Transaction::create([
        //         'contract_order_id' => $order->id,
        //         'transaction_number' => $request->transaction_id,
        //         'payment_result' => 'success',
        //     ]);
        // }
        if ($request->payment_method == 'wallet') {
            $transaction = Transaction::create([
                'order_id' => $order->id,
                'contract_order_id' => $contract_order->id,
                'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
                'payment_result' => 'success',
                'payment_method' => $request->payment_method,
            ]);
            Order::where('id', $order->id)->update(array('partial_amount' => 0));
            dd(Order::where('id', $order->id)->first());
        } elseif ($request->payment_method == 'cache') {
            $transaction = Transaction::create([
                'order_id' => $order->id,
                'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
                'payment_result' => 'success',
                'payment_method' => $request->payment_method,
            ]);
            Order::where('id', $order->id)->update(array('partial_amount' => $total));
        } else {
            Transaction::create([
                'order_id' => $order->id,
                'contract_order_id' => $contract_order->id,
                'transaction_number' => $request->transaction_id,
                'payment_result' => 'success',
                'payment_method' => $request->payment_method,
                //  'amount' => $total,
            ]);

            Order::where('id', $order->id)->update(array('partial_amount' => 0));
        }
        $user->update([
            'point' => $user->point - $request->wallet_discounts ?? 0
        ]);

        $this->wallet($user, $total);
        Cart::query()->whereIn('id', $carts->pluck('id'))->delete();
        $this->body['order_id'] = $order->id;
        return self::apiResponse(200, __('api.order created successfully'), $this->body);
    }

    private function wallet($user, $total)
    {

        $walletSetting = CustomerWallet::query()->first();

        $wallet = ($total * $walletSetting->order_percentage) / 100;

        if ($wallet > $walletSetting->refund_amount) {
            $point = $walletSetting->refund_amount;
        } else {
            $point = $wallet;
        }
        $user->update([
            'point' => $user->point + $point ?? 0
        ]);
    }

    protected function paid(Request $request)
    {
        $rules = [
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|in:cache,visa,wallet',
            //   'amount' => 'required|numeric',
            'transaction_id' => 'nullable',
            'wallet_discounts' => 'nullable|numeric',
        ];
        $request->validate($rules, $request->all());
        $user = auth()->user('sanctum');

        $request->validate($rules, $request->all());

        Transaction::create([
            'order_id' => $request->order_id,
            'transaction_number' => $request->transaction_id,
            'payment_result' => 'success',
            'payment_method' => $request->payment_method,
            //     'amount' => $request->amount,
        ]);

        $order = Order::where('id', $request->order_id)->first();

        $order->update([
            //         'payment_status' => 'paid',
            'partial_amount' => 0,
        ]);

        $user->update([
            'point' => $user->point - $request->wallet_discounts ?? 0
        ]);

        return self::apiResponse(200, __('api.paid successfully'), $this->body);
    }
}
