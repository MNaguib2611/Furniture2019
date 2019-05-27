<?php

namespace App\Http\Controllers;

use App\DebitedTransaction;
use App\TransactionTypes;
use Illuminate\Http\Request;

class DebitedTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactionTypes    = TransactionTypes ::all();
        $debitedTransactions = DebitedTransaction::latest()->paginate(10);
        $totalAmount =0;
        foreach ( $debitedTransactions as $debitedTransaction) {
                $totalAmount +=(int)$debitedTransaction->amount;
        }
        return view('debited-transactions',compact('debitedTransactions','transactionTypes','totalAmount'));
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
        // dd($request->all());
        $transactionType = TransactionTypes::where('id',$request->transactionType_id)->first();
        DebitedTransaction::create([
           'amount'                => $request->amount ,
            'transactionType_name'   =>$transactionType->name,
            'transactionType_color' =>$transactionType->color,
        ]);
        return back()->with('Success','تم إضافة المعاملة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DebitedTransaction  $debitedTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(DebitedTransaction $debitedTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DebitedTransaction  $debitedTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(DebitedTransaction $debitedTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DebitedTransaction  $debitedTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DebitedTransaction $debitedTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DebitedTransaction  $debitedTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(DebitedTransaction $debitedTransaction)
    {
        //
    }
    public function removeDebitedTransaction($id)
    {
        DebitedTransaction::where('id',$id)->delete();
       return back()->with('Success','تم ازالة المعاملة بنجاح');
    }
}
