@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <h1>Total Bayar</h1> --}}
    {{-- Tampil flash message --}}
    {{-- <div class="container">
        <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Pembayaran belum termasuk biaya Transport Luar Kota.</strong>
        </div>
    </div>
    <div class="container text-center row d-flex justify-content-center my-5">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Total Pembayaran</h4>
                    <h5> Rp. {{ $orders->total_harga }} </h5>
                    <p></p><p></p>
                    <p> Paket Order: <br>{{ $orders->package }} 
                    <br>{{ $orders->nama_paket }}
                    <br>Pemesan: {{ $orders->nama_pemesan  }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center my-5">
        <a href="{{ url('/invoice') }}" class="btn btn-secondary mr-4">Pembayaran</a>
    </div>
</div> --}}

<div class="card">
    <div class="card-body">
      <div class="container mb-5 mt-3">
        <div class="row d-flex align-items-baseline">
          <div class="col-xl-9">
            <i class="far fa-building fa-4x ms-0" style="color:#fd572e ;"></i>
            <p class="pt-2" style="font-size: 13px; color:#f6522e ;">
                <i class="fab fa-mdb fa-2x ms-0">Haydey Moment</i>
            </p>
          </div>
          <div class="col-xl-3 float-end">
            <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                class="fas fa-print text-primary"></i> Print</a>
            <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                class="far fa-file-pdf text-danger"></i> Export</a>
          </div>
          <hr  style="width: 100%; height: 1px;">
        </div>
  
          <div class="row">
            <div class="col-xl-8">
              <ul class="list-unstyled">
                <li class="text-muted"><span class="fw-bold">To: {{ $orders->nama_pemesan  }}</span></li>
                <li class="text-muted"><span class="fw-bold">Invoice: </span>#123-456</li>
                <li class="text-muted"><span class="fw-bold">Creation Date: </span>Jun 23,2021</li>
                <li class="text-muted"><span class="me-1 fw-bold">Status: </span><span class="badge bg-warning text-black fw-bold"> Unpaid</span></li>
              </ul>
            </div>
            <div class="col-xl-4">
              <ul class="list-unstyled">
                <li class="text-muted"><span style="color:#f6522e ;">Haydey Moment</span></li>
                <li class="text-muted">Jl. Pasar kemis-Cikupa <br>Suka Asih Rt.01/03 Kecamatan Pasar Kemis</li>
                <li class="text-muted">Kab.Tangerang-Banten 15560</li>
                <li class="text-muted"><i class="fas fa-envelope"></i> haydeymoment@gmail.com</li>
                <li class="text-muted"><i class="fas fa-phone"></i> +62 877-7501-8085</li>
              </ul>
            </div>
          </div>
  
          <div class="row my-2 mx-1 justify-content-center">
            <table class="table table-borderless">
              <thead style="background-color:#f6522e ;" class="text-white">
                <tr>
                  {{-- <th scope="col">#</th> --}}
                  <th scope="col">Package</th>
                  <th scope="col">Item Package</th>
                  <th scope="col">Description</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  {{-- <th scope="row">1</th> --}}
                  <td>{{ $orders->package }}</td>
                  <td>{{ $orders->nama_paket }}</td>
                  <td>{!! nl2br( $orders->ket_paket) !!}</td>
                  <td>Rp. {{ $orders->total_harga }}</td>
                </tr>
                <tr>
                  <td>
                    <p class="ms-3">Add additional notes and payment information</p>
                    <p class="ms-3">Add additional notes and payment information</p>
                  </td>
                </tr>
              </tbody>
  
            </table>
          </div>
          <div class="row">
            <div class="col-xl-9">
              <p class="ms-3">Add additional notes and payment information</p>
  
            </div>
            <div class="col-xl-3">
              <ul class="list-unstyled">
                <li class="text ms-3 mt-2"><span class="text-black me-4" style="font-size: 20px;" >Total Bayar Rp. {{ $orders->total_harga }}</span></li>
              </ul>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-xl-10">
              <p>Thank you for your purchase</p>
            </div>
            <div class="col-xl-2">
              <a href="{{ url('/pembayaran') }}" class="btn btn-primary text-capitalize" 
              style="background-color:#50a4d5 ;">Pembayaran</a>
              {{-- <button type="submit" class="btn btn-primary text-capitalize"
                style="background-color:#50a4d5 ;">Pembayaran</button> --}}
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </div>

@endsection