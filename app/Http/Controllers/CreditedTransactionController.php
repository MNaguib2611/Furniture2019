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
        $transactionTypes    = TransactionTypes ::all();
        $creditedTransactions = CreditedTransaction::latest()->paginate(10);

        $totalAmount =0;
        foreach ( $creditedTransactions as $creditedTransaction) {
                $totalAmount +=(int)$creditedTransaction->amount;
        }
        return view('credited-transactions',compact('creditedTransactions','transactionTypes','totalAmount'));
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
        // dd( $transactionType);
        // dd($transactionType);
        CreditedTransaction::create([
            'amount'                => $request->amount ,
            'transactionType_name'   =>$transactionType->name,
            'transactionType_color' =>$transactionType->color,
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
    public function removeCreditedTransaction($id)
    {
        CreditedTransaction::where('id',$id)->delete();
       return back()->with('Success','تم ازالة المعاملة بنجاح');
    }
}
