@extends('admin.layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Payments Link</h1>
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-sm btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus"></i> Tambah rekening baru
    </button>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>Nama Bank</th>
                            <th>No Rekening</th>
                            <th>Pemilik Rekening</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                        <tr>
                            <td>
                                <a href="#" class="badge badge-success" data-toggle="modal" data-target="#editModal{{ $payment->id }}">Edit</a>
                                {{-- Start edit modal --}}
                                    <div class="modal fade" id="editModal{{ $payment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Rekening</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/payments-update/{{ $payment->id }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $payment->id }}">
                                                    <div class="form-group">
                                                        <label for="nama_bank">Nama Bank <small class="text-danger">*</small></label>
                                                        <input type="text" id="nama_bank" name="nama_bank" class="form-control" value="{{ $payment->nama_bank }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_rek">No Rekening<small class="text-danger">*</small></label>
                                                        <input type="number" id="no_rek" name="no_rek" class="form-control" value="{{ $payment->no_rekening }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="pemilik">Pemilik Rekening <small class="text-danger">*</small></label>
                                                      <input type="text" id="pemilik" name="pemilik" class="form-control" value="{{ $payment->pemilik_rekening }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                      <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                  </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- End edit modal --}}
                                <form action="/admin/payments/{{ $payment->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                            <td>{{ $payment->nama_bank }}</td>
                            <td>{{ $payment->no_rekening }}</td>
                            <td>{{ $payment->pemilik_rekening }}</td>
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

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Rekening Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/admin/new-payments-link" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_bank">Nama Bank <small class="text-danger">*</small></label>
                <input type="text" id="nama_bank" name="nama_bank" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="no_rek">No Rekening<small class="text-danger">*</small></label>
                <input type="number" id="no_rek" name="no_rek" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="pemilik">Pemilik Rekening <small class="text-danger">*</small></label>
              <input type="text" id="pemilik" name="pemilik" class="form-control" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection