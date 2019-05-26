<?php

namespace App\Http\Controllers;

use App\Product;
use Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::where('inStock',1)->paginate(10);
        return view('products',compact('products'));
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

            'product_name' => 'required',
            'product_description' => 'required',
            'product_price'=> 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
       }else {
        Product::create([
            'name'    =>  $request->product_name,
            'description'   =>  $request->product_description,
            'price'   =>  $request->product_price,
        ]);

        return back()->with('Success','تم إضافة المنتج بنجاح');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function removeProduct($id)
    {
       Product::where('id',$id)->delete();
       return back()->with('Success','تم ازالة المنتج بنجاح');
    }

}
