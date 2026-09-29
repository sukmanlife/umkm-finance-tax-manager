@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="row justify-content-center"><div class="col-md-5"><div class="card shadow-sm"><div class="card-body p-4">
<h3 class="mb-3">Admin Login</h3>
<form method="POST" action="{{ route('login.store') }}">@csrf
<div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" value="{{ old('email') }}" class="form-control" required></div>
<div class="mb-3"><label class="form-label">Password</label><input type="password" name="password" class="form-control" required></div>
<div class="form-check mb-3"><input class="form-check-input" type="checkbox" name="remember" id="remember"><label class="form-check-label" for="remember">Ingat saya</label></div>
<button class="btn btn-dark w-100">Login</button>
</form>
</div></div></div></div>
@endsection
