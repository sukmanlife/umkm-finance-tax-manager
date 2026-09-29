@extends('layouts.app')
@section('title','Edit Transaksi')
@section('content')<h2 class="mb-3">Edit Transaksi</h2><div class="card shadow-sm"><div class="card-body"><form method="POST" action="{{ route('transactions.update',$transaction) }}">@method('PUT') @include('transactions._form')</form></div></div>@endsection
