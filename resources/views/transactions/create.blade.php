@extends('layouts.app')
@section('title','Tambah Transaksi')
@section('content')<h2 class="mb-3">Tambah Transaksi</h2><div class="card shadow-sm"><div class="card-body"><form method="POST" action="{{ route('transactions.store') }}">@include('transactions._form')</form></div></div>@endsection
