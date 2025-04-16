<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function store(Request $request) {
        // dd($request);
        $session = $request->get('shopifySession'); // Provided by the shopify.auth middleware, guaranteed to be active

        $session_id = $session->getShop();
        $request->validate([     
            'subject' => 'required',
            'title' => 'required',
            'message' => 'required',
            'text' => 'required',
            'support' => 'required',
            'numOfTime' => 'required',
            'sendAfterDays' => 'required',
            'on_minimum_order_amount' => 'required',
            'orderAmount' => 'required_if:on_minimum_order_amount,true',
        ]);
        // dd($request->all());
        $setting = Setting::firstOrNew(['session_id'=>  $session_id]);
        $setting->session_id = $session_id;
        $setting->subject = $request->subject;
        $setting->title = $request->title;
        $setting->message = $request->message;
        $setting->text = $request->text;
        $setting->support = $request->support;
        $setting->number_of_time = $request->numOfTime;
        $setting->send_after_days = $request->sendAfterDays;
        $setting->on_minimum_order_amount = $request->on_minimum_order_amount;
        $setting->min_order_amount = $request->orderAmount;
        $setting->save();
        return response()->json($setting,200);
    }

    public function showData(){
          $showsetting = Setting::find(1);
         return  $showsetting;
    }

}
