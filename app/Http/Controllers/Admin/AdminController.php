<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages;
use App\Models\Items;
use App\Models\PaymentsLink;
use App\Models\Orders;
use App\Models\Gallery;
use Illuminate\Support\Str;
class AdminController extends Controller
{
    public function dashboard()
    {
        $judul = 'Dashboard';
        return view('admin.dashboard', compact('judul'));
    }

    public function orders()
    {
        $judul = 'Orders';
        $orders = Orders::all();
        return view('admin.orders_list', compact('judul', 'orders'));
        
    }

    public function orders_delete($id)
    {
        $orders = Orders::find($id);
        $orders->delete();
        return redirect('/admin/orders')->with('pesan', 'Berhasil menghapus data!');
    }
    public function orders_print($id){

        $orders = Orders::find($id);

        return view('admin.orders_print', compact('orders'));
    }

    public function payments()
    {
        $judul = 'Payments';
        $payments = PaymentsLink::all();
        return view('admin.payments_link', compact('judul', 'payments'));
    }

    public function new_payments_link(Request $request)
    {
        $payments = new PaymentsLink();
        $payments->nama_bank        = $request->nama_bank;
        $payments->no_rekening      = $request->no_rek;
        $payments->pemilik_rekening = $request->pemilik;
        $payments->save();
        return redirect('/admin/payments')->with('pesan', 'Berhasil menambahkan data!');
    }

    public function payments_delete($id)
    {
        $payments = PaymentsLink::find($id);
        $payments->delete();
        return redirect('/admin/payments')->with('pesan', 'Berhasil menghapus data!');
    }

    public function payments_update(Request $request, $id)
    {
        $payments = PaymentsLink::find($id);
        $payments->nama_bank        = $request->nama_bank;
        $payments->no_rekening      = $request->no_rek;
        $payments->pemilik_rekening = $request->pemilik;
        $payments->update();
        return redirect('/admin/payments')->with('pesan', 'Berhasil mengubah data!');
    }
    
    public function package()
    {
        $packages = Packages::all();
        $judul = 'Package';
        return view('admin.package_list', compact('judul', 'packages'));
    }

    public function new_package(Request $request)
    {
        $packages = new Packages();
        $packages->package_name     = $request->package_name;
        $packages->slug             = Str::slug($request->package_name);
        $packages->description        = $request->description;
        $packages->starting_price   = $request->starting_price;

        // Upload Gambar
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('uploads'), $imageName);
        $packages->gambar = $imageName;
        $packages->save();
        return redirect('/admin/package')->with('pesan', 'Berhasil menambahkan data!');
    }

    public function package_update(Request $request, $id){

        // cari package berdasarkan id yang dikirimkan dari halaman edit
        $packages = Packages::find($id);


        // tangkap data yang dikirimkan lalu ubah dengan yang baru
        $packages->package_name = $request->package_name;
        $packages->description = $request->description;
        $packages->starting_price = $request->starting_price;

    //     // Upload Gambar
    //     $this->validate($request, [
    //         'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);
    //    $imageName = time().'.'.$request->gambar->extension();  
    //    $request->gambar->move(public_path('uploads'), $imageName);
    //    $packages->gambar = $imageName;

        // update table packges melalui model packages
        $packages->update();
        // arahkan kembali ke url /admin/packge sambil membawa pesan
        return redirect('/admin/package')->with('pesan', 'Berhasil mengubah data');

    }
    public function package_delete($id)
    {
        $packages = Packages::find($id);
        $packages->delete();
        return redirect('/admin/package')->with('pesan', 'Berhasil menghapus data!');
    }

    public function items()
    {
        $judul      = 'Items';
        $items      = Items::all();
        $packages   = Packages::all();
        return view('admin.items_list', compact('judul', 'packages', 'items'));
    }

    public function new_items(Request $request)
    {
        $items = new Items();
        $items->package_id  = $request->package_id;
        $items->nama_paket  = $request->nama_paket;
        $items->ket_paket  = $request->ket_paket;
        $items->hrg_paket  = $request->hrg_paket;
        $items->save();
        return redirect('/admin/items')->with('pesan', 'Berhasil menambahkan data!');
    }

    public function items_delete($id)
    {
        $items = Items::find($id);
        $items->delete();
        return redirect('/admin/items')->with('pesan', 'Berhasil menghapus data!');
    }

    public function items_update(Request $request, $id)
    {
        $items = Items::find($id);
        $items->package_id  = $request->package_id;
        $items->nama_paket  = $request->nama_paket;
        $items->ket_paket  = $request->ket_paket;
        $items->hrg_paket  = $request->hrg_paket;
        $items->update();
        return redirect('/admin/items')->with('pesan', 'Berhasil mengubah data!');
    }

    public function gallery()
    {
        $judul = 'Gallery';
        $packages   = Packages::all();
        $gallery    = Gallery::all();
        return view('admin.gallery', compact('judul', 'packages', 'gallery'));
    }

    public function new_gallery(Request $request)
    {
        $gallery = new Gallery();
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'package_id' => 'required'
        ]);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('uploads'), $imageName);
        $gallery->image = $imageName;
        $gallery->package_id = $request->package_id;
        $gallery->save();
        return redirect('/admin/gallery')->with('pesan', 'Berhasil menambahkan data!');
    }

    public function gallery_update(Request $request, $id)
    {
        $gallery = new Gallery();
        $gallery = Gallery::find($id);
        
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'package_id' => 'required'
        ]);

        $gallery->package_id    = $request->package_id;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        $gallery->image         = $imageName;
        $gallery->update();
        return redirect('/admin/gallery')->with('pesan', 'Berhasil mengubah data!');
    }

    public function gallery_delete($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect('/admin/gallery')->with('pesan', 'Berhasil menghapus data!');
    }
}
