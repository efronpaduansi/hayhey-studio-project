@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Details Package : {{ $packages->package_name }}</h1>
    <div class="row my-5">
        @foreach ($items as $i)
        <div class="col-md-4 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ $i->nama_paket }}</h5>
                    <h6>{{ $i->ket_paket }}</h6>
                    <h4>IDR. {{ $i->hrg_paket }}</h4>
                </div>
                <div class="card-footer">
                    <a href="/package-orders/{{ $i->id }}" class="btn btn-sm btn-primary">Book Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row d-flex justify-content-center my-5">
        <a href="{{ url('/') }}" class="btn btn-secondary mr-4">Kembali</a>
    </div>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Perhatian!</strong> Baca <a href="/terms-and-condition">Terms & Condition</a> sebelum melakukan booking jasa kami.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>


@endsection