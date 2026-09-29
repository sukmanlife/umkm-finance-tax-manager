@extends('layouts.app')
@section('title','Tambah Pelanggan')
@section('content')<h2 class="mb-3">Tambah Pelanggan</h2><div class="card shadow-sm"><div class="card-body"><form method="POST" action="{{ route('customers.store') }}">@include('customers._form')</form></div></div>@endsection
