<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use PhpParser\Node\Expr\FuncCall;

class barangController extends Controller
{
    public function index()
    {

        $sales = DB::table('sales')->get();
        $courier = DB::table('courier')->get();

        // mengirim data pegawai ke view index
        return view('index', [
            'data_invoice' => null, 'sales' => $sales,
            'courier' => $courier, 'data_barang' => null
        ]);
    }

    public function cari(Request $request)
    {
        $no_invoice = $request->no_invoice;
        $sales = DB::table('sales')->get();
        $courier = DB::table('courier')->get();
        $data_invoice = DB::table('invoice')->join('invoice_detail', 'invoice.id_invoice', '=', 'invoice_detail.id_invoice')
            ->join('sales', 'invoice.id_sales', '=', 'sales.id_sales')
            ->join('courier', 'invoice.id_courrier', '=', 'courier.id_courier')
            ->where('invoice.id_invoice', '=', $no_invoice)->get();
        $data_barang = DB::table('invoice_detail')->join('product', 'invoice_detail.id_product', '=', 'product.id_product')
            ->where('invoice_detail.id_invoice', '=', $no_invoice)->get();

        return view('cari', [
            'data_invoice' => $data_invoice, 'sales' => $sales,
            'courier' => $courier, 'data_barang' => $data_barang
        ]);
    }
    function save(Request $request)
    {
        DB::table('invoice')->where('id_invoice', '=', $request->id_invoice)->update([
            'invoice_date' => $request->invoice_date,
            'to' => $request->to,
            'id_sales' => $request->id_sales,
            'id_courrier' => $request->id_courier,
            'ship_to' => $request->ship_to,
            'payment_type' => $request->payment_type
        ], ['invoice_date', 'to', 'id_sales', 'id_courrier', 'ship_to', 'payment_type']);

        $no_invoice = $request->no_invoice;
        $sales = DB::table('sales')->get();
        $courier = DB::table('courier')->get();
        $data_invoice = DB::table('invoice')->join('invoice_detail', 'invoice.id_invoice', '=', 'invoice_detail.id_invoice')
            ->join('sales', 'invoice.id_sales', '=', 'sales.id_sales')
            ->join('courier', 'invoice.id_courrier', '=', 'courier.id_courier')
            ->where('invoice.id_invoice', '=', $no_invoice)->get();
        $data_barang = DB::table('invoice_detail')->join('product', 'invoice_detail.id_product', '=', 'product.id_product')
            ->where('invoice_detail.id_invoice', '=', $no_invoice)->get();

        return redirect('/');
    }
}
