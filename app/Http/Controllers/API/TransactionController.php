<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderCourse;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;

class TransactionController extends Controller
{

    public function all()
    {
        $transactions = Order::all();
        return response()->json($transactions);
    }


    public function checkout(Request $request)
    {

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'member_id' => 'required|exists:users,id',
            'mentor_id' => 'required|exists:users,id',
            'price' => 'required',
            'status' => 'required',
        ]);

        $transaction = Order::create([
            'member_id' => $request->member_id,
            'mentor_id' => $request->mentor_id,
            'price' => $request->price,
            'is_paid' => $request->status,
            'midtrans_url' => "",

        ]);

        $detailOrder = OrderCourse::create([
            'order_id' => $transaction->id,
            'course_id' => $request->course_id,
        ]);

        // konfigurasi ke midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        //panggil transaksi
        // $transaction = Transaction::with(['member_id', 'course_id'])->find($transaction->id);

        // membuat transaksi midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => (int) $transaction->price,
            ],
            'customer_details' => [
                'first_name' => $transaction->member->name,
                'email' => $transaction->member->email,
            ],
            'item_details' => [
                [
                    'id' => $detailOrder->course_id->id,
                    'price' => $transaction->price,
                    'quantity' => 1,
                    'name' => $detailOrder->course_id->title,
                ],
            ],
        ];


        try {
            $midtransUrl = Snap::createTransaction($midtrans)->redirect_url;
            $transaction->midrans_url = $midtransUrl;
            $transaction->save();

            return ResponseFormater::success($transaction, 'Berhasil membuat transaksi');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 'Gagal membuat transaksi');
        }
    }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
