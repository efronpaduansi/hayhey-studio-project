@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Items List</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
  <i class="fa fa-plus"></i> Tambah items
</button>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Nama Package</th>
                        <th>Nama Paket</th>
                        <th>Deskripsi</th>
                        <th>Harga (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>
                            <a href="#" class="badge badge-success" data-toggle="modal" data-target="#editModal{{ $item->id }}">Edit</a>
                            {{-- Start edit modal --}}
                              <!-- Modal -->
                              <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit Items</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="/admin/items-update/{{ $item->id }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="package_id" value="{{ $item->package_id }}">
                                        <div class="form-group">
                                            <label for="nama_paket">Nama Paket <small class="text-danger">*</small></label>
                                            <input type="text" id="nama_paket" name="nama_paket" class="form-control" value="{{ $item->nama_paket }}" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="ket_paket">Deskripsi <small class="text-danger">*</small></label>
                                          <textarea name="ket_paket" id="ket_paket" cols="30" rows="2" class="form-control" >{{ $item->ket_paket }}</textarea>
                                        </div>
                                        <div class="form-group">
                                          <label for="hrg_paket">Harga Paket (Rp)</label>
                                          <input type="number" id="hrg_paket" name="hrg_paket" class="form-control" value="{{ $item->hrg_paket }}" required>
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
                            <form action="/admin/items/{{ $item->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                        <td>{{ $item->packages->package_name}}</td>
                        <td>{{ $item->nama_paket }}</td>
                        <td>{{ $item->ket_paket }}</td>
                        <td>Rp.{{ $item->hrg_paket }}</td>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Item Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/admin/new-items" method="POST">
            @csrf
            <div class="form-group">
                <label for="package_id">Nama Package <small class="text-danger">*</small></label>
                <select name="package_id" id="package_id" class="form-control" required>
                    <option value="">Pilih Package</option>
                    @foreach ($packages as $item)
                        <option value="{{ $item->id }}">{{ $item->package_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_paket">Nama Paket <small class="text-danger">*</small></label>
                <input type="text" id="nama_paket" name="nama_paket" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="ket_paket">Deskripsi <small class="text-danger">*</small></label>
              <textarea name="ket_paket" id="ket_paket" cols="30" rows="2" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="hrg_paket">Harga Paket <small class="text-danger">*</small></label>
              <input type="number" id="hrg_paket" name="hrg_paket" class="form-control" required>
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