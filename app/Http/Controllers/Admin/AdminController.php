<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages;
use App\Models\Items;
use App\Models\PaymentsLink;
use App\Models\Orders;
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
        $packages->save();
        return redirect('/admin/package')->with('pesan', 'Berhasil menambahkan data!');
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
}
