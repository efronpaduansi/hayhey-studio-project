@extends('admin.layouts.app')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Package List</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
  <i class="fa fa-plus"></i> Tambah package
</button>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Thumbnail</th>
                        <th>Nama Package</th>
                        <th>Deskripsi</th>
                        <th>Start Harga (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $item)
                    <tr>
                        <td>
                            <a href="#" class="badge badge-secondary" data-toggle="modal" data-target="#detailsModal{{ $item->id }}">Details</a>
                            {{-- Start details modal --}}
                              <!-- Modal -->
                                <div class="modal fade" id="detailsModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Package Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Nama Package : {{ $item->package_name }}</p>
                                        <p>Deskripsi : {!!  nl2br($item->description) !!}</p>
                                        <p>Start Harga : Rp.{{ $item->starting_price }}</p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            {{-- End details modal --}}
                            <a href="" class="badge badge-success" data-toggle="modal"  data-target="#editModal{{ $item->id }}">Edit</a>
                            {{-- Start edit modal --}}
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="/admin/package-update/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <div class="form-group">
                                          <label for="package_name">Nama Package <small class="text-danger">*</small></label>
                                          <input type="text" id="package_name" name="package_name" class="form-control" value="{{ $item->package_name }}" required>
                                      </div>
                                      <div class="form-group" >
                                          <label for="description">Deskripsi <small class="text-danger">*</small></label>
                                          <textarea name="description" id="description" cols="30" rows="4" class="form-control" required>{{ $item->description }}</textarea>
                                      </div>
                                      <div class="form-group">
                                        <label for="starting_price">Start Harga <small class="text-danger">*</small></label>
                                        <input type="number" id="starting_price" name="starting_price" class="form-control" value="{{ $item->starting_price }}" required>
                                      </div>
                                      {{-- <div class="form-group">
                                        <label for="gambar">Thumbnail <small class="text-danger">*</small></label>
                                        <input type="file" id="gambar" name="gambar" class="form-control" >
                                      </div> --}}
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

                            <a href="/admin/package-delete/{{ $item->id }}" class="badge badge-danger" onclick="return confirm('Anda yakin menghapus data ini?')">Delete</a>
                        </td>
                        <td><img src="{{ asset('uploads/' . $item->gambar) }}"  alt="" height="100px" width="120px"></td>
                        <td>{{ $item->package_name }}</td>
                        <td>{!!  nl2br($item->description) !!}</td>
                        <td>Rp.{{ $item->starting_price }}</td>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Package Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/admin/new-package" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="package_name">Nama Package <small class="text-danger">*</small></label>
                <input type="text" id="package_name" name="package_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi <small class="text-danger">*</small></label>
                <textarea name="description" id="description" cols="30" rows="4" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label for="starting_price">Start Harga <small class="text-danger">*</small></label>
              <input type="number" id="starting_price" name="starting_price" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="gambar">Thumbnail <small class="text-danger">*</small></label>
              <input type="file" id="gambar" name="gambar" class="form-control" required>
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