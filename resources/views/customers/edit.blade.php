@extends('layouts.app')
@section('title','Edit Pelanggan')
@section('content')<h2 class="mb-3">Edit Pelanggan</h2><div class="card shadow-sm"><div class="card-body"><form method="POST" action="{{ route('customers.update',$customer) }}">@method('PUT') @include('customers._form')</form></div></div>@endsection
