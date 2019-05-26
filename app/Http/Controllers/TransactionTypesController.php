<?php

namespace App\Http\Controllers;

use App\TransactionTypes;
use Illuminate\Http\Request;

class TransactionTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactionTypes = TransactionTypes::all();
        return view('transaction-types',compact('transactionTypes'));
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
     * @param  \App\TransactionTypes  $transactionTypes
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionTypes $transactionTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransactionTypes  $transactionTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionTypes $transactionTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransactionTypes  $transactionTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionTypes $transactionTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransactionTypes  $transactionTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionTypes $transactionTypes)
    {
        //
    }
}
