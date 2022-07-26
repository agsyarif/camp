<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\checkout_course;
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
        $transactions = checkout_course::all();
        $active = 'transaction';
        return view('pages.Dashboard.admin.transaction.index', compact('transactions', 'active'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = checkout_course::find($id);
        $option = [
            '1' => 'Pending',
            '2' => 'Success',
            '3' => 'Cancel',
        ];

        return view('pages.Dashboard.admin.transaction.edit', compact('transaction', 'option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = checkout_course::find($id);
        $transaction->midtrans_booking_code = $request->status;
        $transaction->save();

        toast()->success('Update has been succes');
        return redirect()->route('admin.transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = checkout_course::find($id);
        $transaction->delete();
        toast()->success('Delete has been succes');
        return redirect()->route('admin.transaction.index');
    }
}
