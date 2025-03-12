<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Review;


class OrderController extends Controller
{
    protected $review;
    protected $order;

    public function __construct(Review $review,Order $order){
            $this->review = $review;
            $this->order = $order;

    }
    public function get_order(Request $request,$order_id) {
        $order =$this->order->firstWhere('order_id',$order_id);
          return view('order',compact('order'));
    }

    public function review_submit (Request $request)
    {
        // dd($request->all());
        $order_id = $request->order_id;
        $order = $this->order->firstWhere('order_id',$order_id);
        
        $order->review = $request['comment'];
        $order->save();

        if(isset($request->rating) && sizeof($request->rating) > 0 ){
            foreach ($request->rating as $key => $value) {
                $data= [
                    'order_id'=>$request->order_id,
                    'type' =>$key,
                    'rating'=>$value,
                ];
                $this->review->create($data);
            }
        }

        return redirect()->back();
    }

}
