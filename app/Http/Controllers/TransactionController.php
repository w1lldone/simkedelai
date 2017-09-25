<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth', 'role:industri']);
        // $this->middleware('can:create,App\Transaction')->only('create');
    }

    public function validator($request)
    {
        $max = \App\Harvest::readyStock()->sum('ending_stock');

        return Validator::make($request, [
            'quantity' => "required|numeric|max:$max",
            'delivered_to' => "required|string",
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = auth()->user()->transaction()->latest()->get();
        $total['quantity'] = auth()->user()->transaction()->where('status_id', 3)->get()->sum('total_quantity');
        $total['value'] = number_format(auth()->user()->transaction()->where('status_id', 3)->get()->sum('total_payment'), 0, ',', '.');
        return view('transaction.index', compact(['transactions', 'total']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $transaction = Transaction::newTransaction($request);
        $transaction->sendSoldNotification();

        return redirect('/transaction')->with('success', 'Berhasil melakukan transaksi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.view', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
