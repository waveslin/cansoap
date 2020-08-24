<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Order;

class pdfController extends Controller
{
    //
    public function makeReceipt($oid){
        $order = Order::where('oid', '=', $oid)->firstOrFail();
        $list = explode('|', $order->description);
        array_pop($list);
        $pdf = PDF::loadView('pdf.receipt', ['order'=> $order, 'list'=> $list]);  
        return $pdf->download('wavesoap_receipt.pdf');
    }
}
