<?php

namespace App\Http\Controllers;

use App\Order;
use App\Customer;
use Validator;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\Product;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::latest()->paginate(10);
        return view('customers',compact('customers'));
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
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|min:2',
            'phone' => 'required|unique:customers',
            'customer_email' => 'nullable',
            'customer_address'=> 'required|min:12',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
       }else {
        Customer::create([
            'name'    =>  $request->customer_name,
            'phone'   =>  $request->phone,
            'email'   =>  $request->customer_email,
            'address' => $request ->customer_address
        ]);

        return back()->with('Success','تم إضافة العميل بنجاح');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
       $orders = Order::where('customer_id',$customer->id)->latest()->paginate(5);
        return view('customerShow',compact('customer','orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());
        return back()->with('Success','تم تعديل العميل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function removeCustomer($id)
    {
        Customer::where('id',$id)->delete();
        $orders = Order::where('customer_id',$id)->get();
        foreach ( $orders as  $order) {
            $orderProducts = OrderProduct::where('order_id',$order->id)->get();
            foreach ( $orderProducts as  $orderProduct) {
                Product::where('id',$orderProduct->product_id)->update(['inStock'=>1]);
            }
            OrderProduct::where('order_id',$order->id)->delete();
        }
        Order::where('customer_id',$id)->delete();

       return back()->with('Success','تم ازالة العميل بنجاح');
    }
}
