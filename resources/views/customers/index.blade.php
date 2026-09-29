@extends('layouts.app')
@section('title','Pelanggan')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3"><h2>Pelanggan</h2><a href="{{ route('customers.create') }}" class="btn btn-dark">+ Pelanggan</a></div>
<form class="mb-3"><div class="input-group"><input name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari nama pelanggan"><button class="btn btn-outline-dark">Cari</button></div></form>
<div class="card shadow-sm"><div class="table-responsive"><table class="table mb-0 align-middle"><thead><tr><th>Nama</th><th>Email</th><th>Telepon</th><th></th></tr></thead><tbody>
@forelse($customers as $customer)<tr><td>{{ $customer->name }}</td><td>{{ $customer->email ?: '-' }}</td><td>{{ $customer->phone ?: '-' }}</td><td class="text-end"><a class="btn btn-sm btn-outline-primary" href="{{ route('customers.edit',$customer) }}">Edit</a> <form class="d-inline" method="POST" action="{{ route('customers.destroy',$customer) }}">@csrf @method('DELETE')<button onclick="return confirm('Hapus pelanggan?')" class="btn btn-sm btn-outline-danger">Hapus</button></form></td></tr>@empty<tr><td colspan="4" class="text-center text-muted py-4">Belum ada pelanggan.</td></tr>@endforelse
</tbody></table></div></div><div class="mt-3">{{ $customers->links() }}</div>
@endsection
