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
                            <th>Aksi</th>
                            <th>Nama Pemesan</th>
                            <th>Package</th>
                            <th>Nama Paket</th>
                            <th>Deskripsi Paket</th>
                            <th>Couple Name</th>
                            <th>Tgl Pelaksanaan</th>
                            <th>Lokasi Pelaksanaan</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Telp/WA</th>
                            <th>Pembayaran</th>
                            <th>Total Harga (Rp)</th>
                            <th>Ket.</th>
                            <th>Tambahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <a href="/admin/orders-print/{{ $order->id }}" target="_blank" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i></a><br><br>
                                    <form action="/admin/orders/{{ $order->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Anda yakin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                                <td>{{ $order->nama_pemesan }}</td>
                                <td>{{ $order->packages->package_name }}</td>
                                <td>{{ $order->nama_paket }}</td>
                                <td>{{ $order->ket_paket }}</td>
                                <td class="text-center">
                                    @if ($order->nama_pasangan == 0)
                                        -
                                    @else
                                        {{ $order->nama_pasangan }}
                                    @endif
                                </td>
                                <td>
                                    {{ $order->tgl_pelaksanaan }}
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
                                <td class="text-center">
                                    @if ( $order->keterangan == 0)
                                    -
                                    @else
                                        {{ $order->keterangan }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Tampil flash message --}}
    @if ($message = Session::get('pesan'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
    </div>
    @endif
@endsection