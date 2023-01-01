@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pembayaran</h1>
    {{-- Tampil flash message --}}
    @if ($message = Session::get('pesan'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row my-5">
        @foreach ($payments_link as $payment)  
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ $payment->nama_bank }}</h5>
                    <h6>No Rekening : {{ $payment->no_rekening }}</h6>
                    <p>Atas Nama : {{ $payment->pemilik_rekening }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row d-flex justify-content-center my-5">
        <a href="{{ url('/') }}" class="btn btn-secondary mr-4">Kembali</a>
        <?php $pemesan = Session::get('nama'); ?>
        <a href="https://api.whatsapp.com/send?phone=+62 896-0273-7874&text=Halo%20Admin%20mohon%20untuk%20mengkonfirmasi%20pesanan%20saya." target="_blank" class="btn btn-success">Konfirmasi pembayaran via WhatsApp</a>
    </div>
</div>


@endsection