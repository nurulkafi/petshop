<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceTransaction;
use App\Models\ServiceTransactionDetail;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Midtrans\Transaction;
use GuzzleHttp\Client;

class ServiceTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $transaction = ServiceTransaction::orderBy('transaction_date','desc')->get();
        return view('admin.service.transaction.index',compact('transaction'));
    }
    public function _code(){
        $transactionDate = date('Y-m-d');
        $transaction = DB::table('service_transaction')
            ->selectRaw('MAX(code) as last_code')
            ->where('transaction_date', 'like', '%' . $transactionDate . '%')
            ->first();
        $date = date('Ymd');
        if ($transaction != null) {
            $transaction = substr($transaction->last_code, 21, 4) + 1;
            $transaction = "INV/SERVICE/" . $date . "/" . sprintf('%04s', $transaction);
            return $transaction;
        } else {
            $transaction = "INV/SERVICE/" . $date . "/0001";
            return $transaction;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $service = Service::get();
        return view('admin.service.transaction.create',compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function _saveTransaction($request){
        $date =date('Y-m-d H:i:s');
        $saved = ServiceTransaction::create([
            'code' => $this->_code(),
            'status' => ServiceTransaction::CREATED,
            'payment_status' => $request->payment_status,
            'transaction_date' => $date,
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_telp' => $request->customer_telp,
            'grand_total' => $request->grand_total,
            'user_id' => Auth::user()->id
        ]);
        return $saved;
    }
    public function _saveTransactionDetail($transaction,$request){
        $serviceCount = count($request->service);
        $service = $request->service;
        for ($i=0; $i < $serviceCount ; $i++) {
            $id = explode('|',$service[$i]);
            ServiceTransactionDetail::create([
                'service_transaction_id' => $transaction,
                'service_id' => $id[0]
            ]);
        }
    }
    public function store(Request $request)
    {

        $transaction = DB::transaction(function () use ($request) {
            $transactions = $this->_saveTransaction($request);
            $this->_saveTransactionDetail($transactions->id,$request);
        });
        return redirect('service_transaction')->with('success', 'Transaction Created Successfully');
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
        $transaction = ServiceTransaction::findOrFail($id);
        return view('admin.service.transaction.show',compact('transaction'));
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
    public function process($id)
    {
        $transaction = ServiceTransaction::findOrFail($id);
        $transaction->status = ServiceTransaction::PROCESSED;
        $transaction->save();
        return redirect()->back()->with('success', 'Transaction Processed');
    }
    public function finish($id)
    {
        $transaction = ServiceTransaction::findOrFail($id);
        $this->send_message($transaction);
        if($transaction->payment_status == ServiceTransaction::PAID){
            $transaction->status = ServiceTransaction::COMPLETED;
            $transaction->save();
            return redirect()->back()->with('success', 'Transaction Completed');
        } else {
            $transaction->status = ServiceTransaction::WAITING;
            $transaction->save();
            $number = substr($transaction->customer_telp, 1);
            return redirect()->back()->with('success', 'Transaction Waiting Payment');
        }
    }
    public function payment($id)
    {
        $transaction = ServiceTransaction::findOrFail($id);
        $transaction->status = ServiceTransaction::COMPLETED;
        $transaction->payment_status = ServiceTransaction::PAID;
        $transaction->save();
        return redirect()->back()->with('success', 'Transaction Payment Success');
    }
    public function send_message($transaction){
        $number = substr($transaction->customer_telp,1);
        Http::get('https://panel.rapiwha.com/send_message.php', [
            'apikey' => "B65N5BBOPSQ3KSXJPT9N",
            'number' => '62'.$number,
            'text' => 'Assalamualikum Orderan Dengan '.
                       'No Invoce  : '. $transaction->code.
                       ' Atas Nama ' . $transaction->customer_name.
                       ' Telah Selesai Dikerjakan.'
        ]);
    }
    public function print($id)
    {
        $transaction = ServiceTransaction::findOrFail($id);
        return view('admin.service.transaction.print',compact('transaction'));
    }
}
