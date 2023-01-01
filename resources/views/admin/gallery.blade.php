@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Gallery</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
  <i class="fa fa-plus"></i> Tambah gallery
</button>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Gambar</th>
                        <th>Nama Package</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($gallery as $g)
                      
                  <tr>
                    <td>
                      <form action="/admin/gallery/{{ $g->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/admin/gallery/{{ $g->id }}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                      </form>
                    </td>
                    <td> 
                      <img src="{{ asset('uploads/'.$g->image) }}" alt="" width="100px">
                    </td>
                    <td>{{ $g->package->package_name }}</td>
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
          <form action="/admin/gallery" method="POST" enctype="multipart/form-data">
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
                <label for="image">Image <small class="text-danger">*</small></label>
                <input type="file" id="image" name="image" class="form-control" required>
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