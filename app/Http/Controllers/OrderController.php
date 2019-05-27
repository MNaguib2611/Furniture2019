<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\DebitedTransaction;
use App\CreditedTransaction;
use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::latest()->paginate(10);
        // dd($orders);
        $customers = Customer::all();
        return view('orders',compact('orders','customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $newCreditedTransaction = CreditedTransaction::create([
            'amount' => 0 ,
            'transactionType_name' => 'عميل',
            'transactionType_color' => '#add8e9'
        ]);
            // dd($newCreditedTransaction->id);
        $newOrder = Order::create([
            'customer_id'   => $request->customer_id,
            'delivery_time' => $request->delivery_time,
            'credited_transaction_id' => $newCreditedTransaction->id
        ]);
            // dd($newOrder);

        return back()->with('OrderSuccess','تم إضافة الطلب بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('instock',1)->get();
       $order = Order::where('id',$id)->with('orderProduct','orderProduct.product')->first();
    //    dd($order->orderProduct);
    //    dd($orderProducts->product);

    //    dd($order->customer);
       return view('ordersShow',compact('order','products'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return back()->with('OrderSuccess','تم تعديل الطلب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function orderProducts(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'order_id' => 'required|required',
            'product_id' => 'required|unique:order_products',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
       }else {
        Product::where('id',$request->product_id)->update(['instock' => 0]);
        OrderProduct::create([
            'order_id' =>$request->order_id,
            'product_id' =>$request->product_id,
        ]);

        $order =Order::where('id',$request->order_id)->with('orderProduct','orderProduct.product')->first();

        $order->total_price =0;
        foreach ($order->orderProduct as  $value) {

            $order->total_price +=(int)$value->product->price;
            $order->save();
        }
        // dd($order->credited_transaction_id);
        $updateCreditedTransaction = CreditedTransaction::where('id',$order->credited_transaction_id)->first();
        // dd($updateCreditedTransaction);
        $updateCreditedTransaction->update(['amount' =>   $order->total_price]);
        $updateCreditedTransaction->save();

        return back()->with('OrderSuccess','تم إضافة المنتج للطلبية بنجاح');

       }
    }


}
