<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use App\Product;
use App\Order;
use App\CreditedTransaction;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProduct $orderProduct)
    {
        //
    }

    public function removeOrderProduct($id)
    {

        $orderProduct = OrderProduct::where('id',$id)->first();
       Product::where('id',$orderProduct->product_id)->update(['inStock' => 1]);
        $orderProduct->delete();
        $order =Order::where('id',$orderProduct->order_id)->with('orderProduct','orderProduct.product')->first();

        $order->total_price =0;
        foreach ($order->orderProduct as  $value) {

            $order->total_price +=(int)$value->product->price;
            $order->save();
        }

        $updateCreditedTransaction = CreditedTransaction::where('id',$order->credited_transaction_id)->first();
        // dd($updateCreditedTransaction);
        $updateCreditedTransaction->update(['amount' =>   $order->total_price]);
        $updateCreditedTransaction->save();
       return back()->with('Success','تم ازالة المنتج  من الطلبية بنجاح');
    }

}
