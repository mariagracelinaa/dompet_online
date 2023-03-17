<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Category;
use DB;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        $categories = Category::orderBy('name','asc')->get();
        return view('transaction.index', compact('transactions','categories'));
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
        try{
           // masih tidak ada usernya, kalau ada user login untuk dapat id user nya pakai perintna Auth::user()->id;
            $users_id = 1;

            $transaction = new Transaction();
            $transaction->date = $request->get('date');
            $transaction->categories_id	= $request->get('category');
            $transaction->nominal = $request->get('nominal');
            $transaction->users_id = $users_id;
            $transaction->desc = $request->get('desc');

            if($transaction->save()){
                return redirect()->route('transactions.index')->with('status','Data transaksi berhasil disimpan');
            }else{
                return redirect()->route('transactions.index')->with('error', 'Data transaksi gagal disimpan, silahkan coba lagi');
            }
        }catch(\PDOException $e){
            return redirect()->route('transactions.index')->with('error', 'Data transaksi gagal disimpan, silahkan coba lagi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $categories = Category::orderBy('name','asc')->get();
        return view('transaction.edit', compact('transaction','categories'));
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
        try{
             $transaction->date = $request->get('editDate');
             $transaction->categories_id	= $request->get('editCategory');
             $transaction->nominal = $request->get('editNominal');
             $transaction->users_id = 1;
             $transaction->desc = $request->get('editDesc');
             $transaction->status = $request->get('editStatus');
 
             if($transaction->save()){
                 return redirect()->route('transactions.index')->with('status','Data transaksi berhasil diubah');
             }else{
                 return redirect()->route('transactions.index')->with('error', 'Data transaksi gagal diubah, silahkan coba lagi');
             }
         }catch(\PDOException $e){
             return redirect()->route('transactions.index')->with('error', 'Data transaksi gagal diubah, silahkan coba lagi');
         }
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
