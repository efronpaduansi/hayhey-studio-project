@extends('admin.layouts.app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Selamat datang, {{ Auth()->user()->name }}</h1>
    
@endsection