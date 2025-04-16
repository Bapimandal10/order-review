<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Review;
use App\Models\ReviewType;
use DB;

class OrderController extends Controller
{
    protected $review;
    protected $order;

    public function __construct(Review $review,Order $order){
            $this->review = $review;
            $this->order = $order;

    }
    public function get_order(Request $request,$order_id) {
        // print_r($request->all());
        if (!$request->logged_in_customer_id){
            return redirect()->away('/account/login');
        }

        // $order =$this->order->firstWhere('order_id',$order_id);
        $order = $this->order->where([
            'order_id' => $order_id,
            'customer_id' => $request->logged_in_customer_id,
        ])->first();
        if(!$order){
            return response()-> view('shopify404')->header('Content-Type','application/liquid');
        }
        $review_types = ReviewType::where('session_id', $order->session_id)->where('status',1)->get();
        // $reviews = Review::all();

    
        // dd($reviews->count());
        
           
        return response()-> view('order',compact('order','review_types'))->header('Content-Type','application/liquid');
        
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

        // return redirect()->back();

        return response()->json(['success' => true]);
    }

}
