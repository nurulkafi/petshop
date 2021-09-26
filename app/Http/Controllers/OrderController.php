<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipment;
use App\Models\Payment;
use App\Models\Product;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
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
    public function codeOrder(){
        $orderDate = date('Y-m-d');
        $order = DB::table('order')
                ->selectRaw('MAX(no_ref) as last_code')
                ->where('order_date','like','%'.$orderDate.'%')
                ->first();
        $date = date('Ymd');
        if($order != null){
            $order = substr($order->last_code, 13, 4)+1;
            $order = "INV/" . $date . "/" . sprintf('%04s', $order);
            return $order;
        }else{
            $order = "INV/" . $date . "/0001";
            return $order;
        }
    }

    public function saveOrder($request) {
        $orderDate = date('Y-m-d H:i:s');
        $save = [
            'user_id' => Auth::user()->id,
            'no_ref' => $this->codeOrder(),
            'status' => Order::CREATED,
            'order_date' => $orderDate,
            'payment_due' => (new \DateTime($orderDate))->modify('+7 day')->format('Y-m-d H:i:s'),
            'payment_status' => Order::UNPAID,
            'base_total_price' => $request['subtotal'],
            'shipping_cost' => $request['shippingcost'],
            'grand_total' => (float) $request['subtotal'] + $request['shiipingcost'],
            'customer_first_name' => $request['first_name'],
            'customer_last_name' => $request['last_name'],
            'customer_address' => $request['address'],
            'customer_phone' => $request['phone'],
            'customer_email' => $request['email'],
            'customer_city_id' => $request['city_id'],
            'customer_province_id' => $request['province_id'],
            'shipping_courier' => $request['codekurir'],
            'shipping_service_name' => $request['service']
        ];

        return Order::create($save);
    }

    public function saveOrderItems($request, $order) {
        for ($i = 0; $i < count($request['product_id']); $i++) {
            $save = [
                'order_id' => $order->id,
                'product_id' => $request->product_id[$i],
                'qty' => $request->qty[$i],
                'base_price' => $request->base_price[$i],
                'base_total' => $request->base_total[$i],
                'discount' => 0,
                'subtotal' => $request->qty[$i] * $request->base_price[$i]
            ];

            $orderItem = OrderItem::create($save);
            if ($orderItem) {
                Product::reduceStock($orderItem->product_id, $orderItem->qty);
            }
        }
    }

    public function _generatePaymentToken($order){
        Controller::initPayment();

        $customerDetails = [
            'first_name' => $order->customer_first_name,
            'last_name' => $order->customer_last_name,
            'email' => $order->customer_email,
            'phone' => $order->customer_phone,
        ];

        $params = [
            'enable_payments' => \App\Models\Payment::PAYMENT_CHANNELS,
            'transaction_details' => [
                'order_id' => $order->no_ref,
                'gross_amount' => $order->grand_total,
            ],
            'customer_details' => $customerDetails,
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
                'unit' => \App\Models\Payment::EXPIRY_UNIT,
                'duration' => \App\Models\Payment::EXPIRY_DURATION,
            ],
        ];

        $snap = \Midtrans\Snap::createTransaction($params);

        if ($snap->token) {
            $order->payment_token = $snap->token;
            $order->payment_url = $snap->redirect_url;
            $order->save();
        }

    }

    public function saveShipment($request, $order) {
        $total_qty = $request->total_qty;

        $save = [
            'user_id' => Auth::user()->id,
            'order_id' => $order->id,
            'status' => Shipment::PENDING,
            'total_weight' => 1000,
            'total_qty' => $total_qty,
            'first_name' => $order->customer_first_name,
            'last_name' => $order->customer_last_name,
            'address' => $order->customer_address,
            'phone' => $order->customer_phone,
            'email' => $order->customer_email,
            'city_id' => $order->customer_city_id,
            'province_id' => $order->customer_province_id,
        ];

        Shipment::create($save);
    }

    public function store(Request $request)
    {
         $order = DB::transaction(
                    function () use ($request) {
                        $order = $this->saveOrder($request);
                        $this->saveOrderItems($request, $order);
                        $this->_generatePaymentToken($order);
                        $this->saveShipment($request, $order);

                        return $order;
                    }
                );

            if ($order) {
                // \Cart::clear();
                return redirect('order/confirm/'.$order->id);
            }
    }

    public function confirm($id) {
        $order = Order::findOrFail($id);
        $items = OrderItem::get();

        return view('shop.confirm', compact('order', 'items')); 
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
