<?php

namespace App\Http\Controllers;

use App\CreditedTransaction;
use App\TransactionTypes;
use Illuminate\Http\Request;

class CreditedTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $creditedTransactions = CreditedTransaction::paginate(10);
        $transactionTypes    = TransactionTypes ::all();
        return view('credited-transactions',compact('creditedTransactions','transactionTypes'));
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
        CreditedTransaction::create([
            'amount'                => $request->amount ,
            'transactionType_name'   =>$request->transactionType_name
        ]);
        return back()->with('Success','تم إضافة المعاملة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CreditedTransaction  $creditedTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(CreditedTransaction $creditedTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CreditedTransaction  $creditedTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditedTransaction $creditedTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CreditedTransaction  $creditedTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditedTransaction $creditedTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CreditedTransaction  $creditedTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditedTransaction $creditedTransaction)
    {
        //
    }
}
