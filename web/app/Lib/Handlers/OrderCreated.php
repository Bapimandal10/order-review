<?php

declare(strict_types=1);

namespace App\Lib\Handlers;

use Illuminate\Support\Facades\Log;
use Shopify\Webhooks\Handler;
use App\Models\Session;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\ReviewMail;
use DB;

class OrderCreated implements Handler
{
    public function handle(string $topic, string $shop, array $order): void
    {
        
        if(Order::where('order_id',$order['id'])->doesntExist()) {
            $order_record = new Order ;
            $order_record->session_id = $shop;
            $order_record->order_id = $order['id'];
            $order_record->customer_id = $order['customer']['id'];
            $order_record->order_data = json_encode($order);
            $order_record->save();
            $setting = DB::table("settings")->where('session_id', $shop)->first();
            
            for ($i=1; $i <= $setting->number_of_time; $i++) { 
                $reviewMail = new ReviewMail;
                $reviewMail->order_id = $order_record->id;
                $reviewMail->mailing_date = date('Y-m-d', strtotime(" + " . $i * $setting->send_after_days . "days"));
                $reviewMail->save();
            }
        }


    }
}
