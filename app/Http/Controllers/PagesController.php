<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Packages;
use App\Models\Orders;
use App\Models\PaymentsLink;
use App\Models\Gallery;

class PagesController extends Controller
{
    public function index()
    {
        $judul = 'Home';
        $packages = Packages::all();
        return view('pages.homepage', compact('packages', 'judul'));
    }

    public function terms_and_condition()
    {
        $judul = 'Terms and Condition';
        return view('pages.terms_and_condition', compact('judul'));
    }

    public function gallery()
    {
        $judul = 'Gallery';
        $packages = Packages::all();
        $galleries = Gallery::all();
        return view('pages.gallery', compact('judul', 'galleries', 'packages'));
    }

    public function gallery_details($id)
    {
        $judul = 'Gallery Details';
        $galleries = Gallery::where('package_id', $id)->get();
        return view('pages.gallery_details', compact('judul', 'galleries'));
    }
    public function package_details($id)
    {
        $judul = 'Package Details';
        // ambil data dari table packages berdasarkan slug dan data dari table items_list berdasarkan id
        $packages   = Packages::where('id', $id)->first();
        //mengambil semua data dari table items_list berdasarkan yang package_id nya sama dengan id yang diambil dari table packages
        $items      = Items::where('package_id', $packages->id)->get();
        return view('pages.package_details', compact('judul', 'packages', 'items'));
    }
    public function package_orders($id)
    {
        $judul = 'Package Orders';
        $items = Items::where('id', $id)->first();
        // $packages = Packages::where('slug', $slug)->first();
        return view('pages.package_orders', compact('judul','items'));
    }

    public function new_orders(Request $request)
    {
        $orders                         = new Orders();
        $orders->package_id             = $request->package_id;
        $orders->nama_pemesan           = $request->nama_pemesan;
        $orders->email_pemesan          = $request->email_pemesan;
        $orders->no_hp_pemesan          = $request->no_hp_pemesan;
        $orders->package               = $request->package;
        $orders->nama_paket             = $request->nama_paket;
        $orders->ket_paket             = $request->ket_paket;
        $orders->nama_pasangan         = $request->nama_pasangan;
        $orders->tgl_pelaksanaan        = $request->tgl_pelaksanaan;
        $orders->lokasi_pelaksanaan     = $request->lokasi_pelaksanaan;
        $orders->alamat                 = $request->alamat;
        $orders->total_harga            = $request->total_harga;
        $orders->pembayaran             = $request->pembayaran;
        $orders->keterangan             = $request->keterangan;
        $orders->save();
        return view('pages.new_orders', compact('orders'));
        //return redirect('/pembayaran')->with('pesan', 'Terima kasih telah memesan paket kami! Silahkan lakukan pembayaran sebelum 24 jam dari sekarang.');
    }

    public function invoice_download($id)
    {
        $orders = Orders::where('id', $id)->first();
        return view('pages.invoice_pdf', compact('orders'));
    }

    // public function invoice()
    // {
    //     $judul = 'Invoice';
    //     $orders = Orders::all();
    //    // return view('pages.invoice', compact('judul','orders'));
    //     return redirect('/pembayaran')->with('pesan', 'Terima kasih telah memesan paket kami! Silahkan lakukan pembayaran sebelum 24 jam dari sekarang.');
    // }

    public function pembayaran($id)
    {
        $judul          = 'Pembayaran';
        $order          = Orders::where('id', $id)->first();
        $total_bayar   = $order->total_harga;
        $payments_link  = PaymentsLink::all();
        $message        = 'Terima kasih telah memesan paket kami! Lakukan pembayaran sebesar Rp.' .$total_bayar . ' ' .  'agar booking pesanan Anda dapat segera diproses ';
        return view('pages.pembayaran', compact('judul', 'payments_link', 'message', 'order'));
        
    }

    public function confirmation($id)
    {
        $order = Orders::where('id', $id)->first();
        $judul = 'Confirmation';
        $message = 'Lakukan Konfirmasi pembayaran agar booking pesanan dapat diproses'; 
        return view('pages.confirmation', compact('judul', 'message', 'order'));
    }

    
}

