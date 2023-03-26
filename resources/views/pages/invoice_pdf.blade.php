<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Invoice {{ date('d/m/Y') }}</title>
</head>
<body>
    
<div class="card">
    <div class="card-body">
      <div class="container mb-5 mt-3">
        <div class="row d-flex align-items-baseline">
          <div class="col-xl-9">
            <i class="far fa-building fa-4x ms-0" style="color:#fd572e ;"></i>
            <p class="pt-2" style="font-size: 13px; color:#f6522e ;">
                Haydey Moment
            </p>
            <h5>Invoice #{{ date('d/m/Y') }}</h5>
          </div>
          <hr  style="width: 100%; height: 1px;">
        </div>
  
          <div class="row">
            <div class="col-xl-8">
              <ul class="list-unstyled">
                <li class="text-muted"><span class="fw-bold">Pemesan          : <strong>{{ $orders->nama_pemesan  }}</strong></span></li>
                <li class="text-muted"><span class="fw-bold">Kontak Pemesan   : </span>{{ $orders->no_hp_pemesan }}</li>
                <li class="text-muted"><span class="fw-bold">Tanggal Pemesanan: </span><strong><?php echo date("d F Y")?></strong></li>
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
                  </td>
                </tr>
              </tbody>  
            </table>
          </div>
          
          <div class="row">
            <div class="col-xl-8">
              <p class="ms-3">Metode pembayaran tersedia melalui</p>
                <img src="{{ asset('img/bank-01.jpeg') }}" alt="" width="85" height="45" style="margin-right: 10px;">
                <img src="{{ asset('img/bank-02.jpeg') }}" alt="" width="85" height="45" style="margin-right: 10px;">
                <img src="{{ asset('img/bank-03.png') }}" alt="" width="85" height="45" style="margin-right: 10px;">
                <img src="{{ asset('img/bank-04.jpg') }}" alt="" width="85" height="45" style="margin-right: 10px;">
                <img src="{{ asset('img/bank-05.png') }}" alt="" width="85" height="45">
            </div>
            <div class="col-xl-3">
              <ul class="list-unstyled">
                <li class="text ms-3 mt-2"><span class="text-black me-4" style="font-size: 20px;"><strong>Total Bayar Rp. {{ $orders->total_harga }}</strong></span></li>
              </ul>
            </div>
          </div>
          <hr><br>
          <div class="row">
            <div class="col-xl-10">
              <p>Silahkan hubung +62 877-7501-8085 apabila kamu membutuhkan bantuan.</p>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </div>
  {{-- Print PDF --}}
    <script>
        window.print();
    </script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>