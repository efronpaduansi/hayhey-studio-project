@extends('admin.layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Orders List</h1>
    <div class="card shadow mb-4">
        <div class="card-body"> 
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pemesan</th>
                            <th>Package</th>
                            <th>Nama Paket</th>
                            <th>Deskripsi Paket</th>
                            <th>Paket Tambahan</th>
                            <th>Tgl Pelaksanaan</th>
                            <th>Lokasi Pelaksanaan</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Telp/WA</th>
                            <th>Pembayaran</th>
                            <th>Total Harga (Rp)</th>
                            <th>Ket.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->nama_pemesan }}</td>
                                <td>{{ $order->packages->package_name }}</td>
                                <td>{{ $order->nama_paket }}</td>
                                <td>{{ $order->ket_paket }}</td>
                                <td class="text-center">
                                    @if ($order->paket_tambahan == 0)
                                        -
                                    @else
                                        {{ $order->paket_tambahan }}
                                    @endif
                                </td>
                                <td>
                                    {{ date('d/m/Y', strtotime($order->tgl_pelaksanaan)) }}
                                </td>
                                <td>{{ $order->lokasi_pelaksanaan }}</td>
                                <td>{{ $order->alamat }}</td>
                                <td>{{ $order->email_pemesan }}</td>
                                <td>{{ $order->no_hp_pemesan }}</td>
                                <td class="text-center">{{ $order->pembayaran }}</td>
                                <td>{{ $order->total_harga }}</td>
                                <td class="text-center">
                                    @if ($order->pembayaran == 'Cash')
                                        <div class="badge badge-success">Lunas</div>
                                    @else
                                        <div class="badge badge-warning">Belum Lunas</div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection