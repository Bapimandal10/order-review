<?php

declare(strict_types=1);

namespace App\Lib\Handlers;

use Illuminate\Support\Facades\Log;
use Shopify\Webhooks\Handler;
use App\Models\Session;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
class OrderCreated implements Handler
{
    public function handle(string $topic, string $shop, array $order): void
    {
        Log::debug("App was OrderCreated from $shop - removing all sessions");
        
        if(Order::where('order_id',$order['id'])->doesntExist()) {
            $order_record = new Order ;
            $order_record->order_id = $order['id'];
            $order_record->customer_id = $order['customer']['id'];
            $order_record->order_data = json_encode($order);
            $order_record->save();
            Mail::to($order['email'])->send(new OrderShipped($order));
            logger(print_r($order,true));
        }


    }
}
