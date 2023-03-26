<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Orders | {{ $orders->nama_pemesan }}</title>
  </head>
  <body>
    <div class="container text-center">
        <h4>Bukti Orders</h4> <br>
        <h5>Nama Pemesan : {{ $orders->nama_pemesan }}</h5> <br>
        <h5>Email Pemesan : {{ $orders->email_pemesan }}</h5> <br>
        <h5>Tanggal Pelaksanaan : {{ $orders->tgl_pelaksanaan }}</h5>
        <hr>

        <table class="table table-bordered">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Package</th>
                    <th>Nama Paket</th>
                    <th>Deskripsi Paket</th>
                    <th>Couple Name</th>
                    <th>Lokasi Pelaksanaan</th>
                    <th>Alamat</th>
                    <th>Tlp/WA</th>
                    <th>Pembayaran</th>
                    <th>Total Hrg</th>
                    <th>Ket</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $orders->packages->package_name }}</td>
                    <td>{{ $orders->nama_paket }}</td>
                    <td> {!! nl2br( $orders->ket_paket ) !!}</td>
                    <td>{{ $orders->nama_pasangan }}</td>
                    <td>{{ $orders->lokasi_pelaksanaan }}</td>
                    <td>{{ $orders->alamat }}</td>
                    <td>{{ $orders->no_hp_pemesan }}</td>
                    <td class="text-center">{{ $orders->pembayaran }}</td>
                    <td>{{ $orders->total_harga }}</td>
                    <td class="text-center">
                        @if ($orders->pembayaran == 'Cash')
                            <div class="badge badge-success">Lunas</div>
                        @else
                            <div class="badge badge-warning">Belum Lunas</div>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

     <!-- Cetak -->
     <script>
        window.print();
      </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>