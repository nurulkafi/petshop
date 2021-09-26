<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\City;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCity($id) {
        $data = City::where('province_code', $id)->pluck('title', 'code');
        return json_encode($data);
    }

    public function getOngkir($key, $url, $data_origin, $data_destination, $data_weight, $data_courier)
    {
        //retry() maskudnya function untuk retry hit API jika time out sebanyak parameter pertama dan range interval pada parameter kedua dalam milisecon
        //asForm() maksudnya menggunakan application/x-www-form-urlencoded content type biasanya untuk method POST
        //withHeaders() maksudnya parameter header (Jika diminta, masing2 API punya header masing-masing dan yang tidak pakai header)
        return Http::retry(10, 200)->asForm()->withHeaders([
            'key' => $key
        ])->post($url, [
            'origin' => $data_origin,
            'destination' => $data_destination,
            'weight' => $data_weight,
            'courier' => $data_courier
        ]);
        //setelah $url itu adalah array yaitu parameter wajib yg dibutuhkan ketika meminta POST request
    }

    public function cekOngkir($id,$berat){
        $kurirs = array('jne' ,'pos','tiki');
        $apiKey = env('RAJA_ONGKIR_KEY');
        $kotaAsal = 23; //kota bandung
        $kotaTujuan = $id;
        $url = 'https://api.rajaongkir.com/starter/cost';
        for ($i=0; $i < count($kurirs) ; $i++) {
            $respons = $this->getOngkir($apiKey, $url, $kotaAsal, $kotaTujuan, $berat, $kurirs[$i]);
            $responses[] = json_decode(json_encode($respons['rajaongkir']), FALSE);
        }
        return json_decode(json_encode($responses), FALSE);
    }

    public function initPayment() {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }
}
