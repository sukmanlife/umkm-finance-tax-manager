@extends('layouts.app')
@section('title','Laporan')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3"><h2>Laporan Bulanan</h2><form class="d-flex gap-2"><input type="number" name="year" class="form-control" value="{{ $year }}" min="2000" max="2100"><button class="btn btn-dark">Tampilkan</button></form></div>
<div class="card shadow-sm"><div class="table-responsive"><table class="table mb-0"><thead><tr><th>Bulan</th><th class="text-end">Transaksi</th><th class="text-end">Pendapatan</th><th class="text-end">Pajak</th><th class="text-end">Total</th></tr></thead><tbody>
@for($month=1;$month<=12;$month++) @php($r=$rows->get($month)) <tr><td>{{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }}</td><td class="text-end">{{ $r->transaction_count ?? 0 }}</td><td class="text-end">Rp {{ number_format($r->revenue ?? 0,0,',','.') }}</td><td class="text-end">Rp {{ number_format($r->tax ?? 0,0,',','.') }}</td><td class="text-end fw-semibold">Rp {{ number_format($r->total ?? 0,0,',','.') }}</td></tr> @endfor
</tbody></table></div></div>
@endsection
