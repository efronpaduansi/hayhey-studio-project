@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Orders Form</h1>
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-6 col-md-6 col-sm-6">
            <form action="{{ url('/new-orders') }}" method="POST">
                @csrf
                <input type="hidden" name="items_id" value="{{ $items->id }}">
                <input type="hidden" name="package_id" value="{{ $items->packages->id }}">
                <div class="form-group">
                    <label for="nama_pemesan">Nama Pemesan <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" autofocus required>
                </div>
                <div class="form-group">
                    <label for="nama_pasangan">Couple Name <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" id="nama_pasangan" name="nama_pasangan" placeholder="Contoh: Aldi dan Rima" required>
                </div>
                <div class="form-group">
                    <label for="package">Package</label>
                    <input type="text" class="form-control" id="package" name="package" value="{{ $items->packages->package_name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_paket">Paket yang di pilih</label>
                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ $items->nama_paket }}" readonly>
                </div>
                <div class="form-group">
                    <label for="ket_paket">Deskripsi Paket</label>
                    <textarea name="ket_paket" id="ket_paket" cols="30" rows="3" class="form-control" readonly>{{ $items->ket_paket }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tgl_pelaksanaan">Tanggal Pelaksanaan <small class="text-danger">*</small></label>
                    <input type="datetime-local" class="form-control" id="tgl_pelaksanaan" name="tgl_pelaksanaan" required>
                    <p style="font-size: 12px"><i>Tentukan tanggal dan jam pelaksanaan</i></p>
                </div>
                <div class="form-group">
                    <label for="lokasi_pelaksanaan">Lokasi Pelaksanaan <small class="text-danger">*</small></label>
                    <textarea class="form-control" name="lokasi_pelaksanaan" id="lokasi_pelaksanaan" cols="30" rows="3"></textarea required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat <small class="text-danger">*</small></label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="email_pemesan">Email <small class="text-danger">*</small></label>
                    <input class="form-control" type="email" name="email_pemesan" id="email_pemesan" required>
                </div>
                <div class="form-group">
                    <label for="no_hp_pemesan">No. Telepon/WhatsApp <small class="text-danger">*</small></label>
                    <input class="form-control" type="number" name="no_hp_pemesan" id="no_hp_pemesan" required>
                </div>
               <div class="form-group">
                <label for="pembayaran">Pembayaran <small class="text-danger">*</small></label>
                <p style="font-size: 12px"><i>Disarankan untuk melakukan pembayaran secara DP</i></p>
                <select class="form-control" id="pembayaran" name="pembayaran" required onclick="tampilkan()">
                    <option value="Cash">Cash</option>
                    <option value="DP">DP</option>
                </select>
               </div>
               <div class="form-group">
                    <label for="total_harga">Total Harga (Rp)</label>
                    <input class="form-control" type="number" name="total_harga" id="total_harga" value="{{ $items->hrg_paket }}"   readonly>
                </div>
                <p id="ket_hrg"></p>
                <div class="form-group">
                    <label for="keterangan">Keterangan lain</label>
                    <input class="form-control" type="text" name="keterangan" id="keterangan">
                </div>
                <button type="submit" class="btn btn-primary">Booking</button>
            </form>
            <div class="alert alert-success my-3" role="alert" id="alert_hrg">
                {{-- tampilkan total --}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        </div>
    </div>
</div>
    
 <script>
   function tampilkan()
   {
    var pembayaran  = document.getElementById('pembayaran');
    var total_harga = document.getElementById('total_harga');
    var ket_hrg     = document.getElementById('ket_hrg');
    var alert_hrg   = document.getElementById('alert_hrg');
    //jika pembayaran di pilih dp maka total harga akan dikalikan dengan 25%
    pembayaran.addEventListener('change', function(){
        if(pembayaran.value == 'DP'){
            total_harga.value = {{ $items->hrg_paket }} * 0.25;
            ket_hrg.innerHTML = 'DP sebesar 25% dari total harga';
            alert_hrg.innerHTML = 'Klik <strong>Booking</strong> dan lakukan pembayaran sebesar <strong>Rp.'+total_harga.value+'</strong>';
        }else{
            total_harga.value = {{ $items->hrg_paket }};
            ket_hrg.innerHTML = 'Pembayaran full harga';
            alert_hrg.innerHTML = 'Klik <strong>Booking</strong> dan lakukan pembayaran sebesar <strong>Rp.'+total_harga.value+'</strong>';
        }
    });
   }
 </script>
@endsection