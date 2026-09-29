@extends('layouts.app')
@section('title','Transaksi')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3"><h2>Transaksi</h2><a href="{{ route('transactions.create') }}" class="btn btn-dark">+ Transaksi</a></div>
<div class="card shadow-sm"><div class="table-responsive"><table class="table mb-0 align-middle"><thead><tr><th>Tanggal</th><th>Pelanggan</th><th>Deskripsi</th><th class="text-end">Nilai</th><th class="text-end">Pajak</th><th class="text-end">Total</th><th></th></tr></thead><tbody>
@forelse($transactions as $trx)<tr><td>{{ $trx->transaction_date->format('d/m/Y') }}</td><td>{{ $trx->customer->name }}</td><td>{{ $trx->description }}</td><td class="text-end">Rp {{ number_format($trx->amount,0,',','.') }}</td><td class="text-end">{{ number_format($trx->tax_rate,2) }}%<br><small>Rp {{ number_format($trx->tax_amount,0,',','.') }}</small></td><td class="text-end fw-semibold">Rp {{ number_format($trx->total_amount,0,',','.') }}</td><td class="text-end"><a class="btn btn-sm btn-outline-primary" href="{{ route('transactions.edit',$trx) }}">Edit</a> <form class="d-inline" method="POST" action="{{ route('transactions.destroy',$trx) }}">@csrf @method('DELETE')<button onclick="return confirm('Hapus transaksi?')" class="btn btn-sm btn-outline-danger">Hapus</button></form></td></tr>@empty<tr><td colspan="7" class="text-center text-muted py-4">Belum ada transaksi.</td></tr>@endforelse
</tbody></table></div></div><div class="mt-3">{{ $transactions->links() }}</div>
@endsection
