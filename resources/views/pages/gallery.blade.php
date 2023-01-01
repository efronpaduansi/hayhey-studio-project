@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($packages as $p)
        <div class="col-4">
            <div class="card shadow-lg my-5" style="width: 18rem;">
                <img src="{{ asset('uploads/' .$p->gambar) }}" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title text-center">
                    <a href="/gallery-details/{{ $p->id }}">{{ $p->package_name }}</a>
                  </h5>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
@endsection