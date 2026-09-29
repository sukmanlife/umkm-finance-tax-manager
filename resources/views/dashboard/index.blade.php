@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="page-head">
<div><div class="eyebrow">Ringkasan usaha</div><h1>Keuangan dalam satu tempat.</h1><p class="muted mb-0">Pantau pelanggan, pendapatan, dan pajak dari seluruh transaksi tercatat.</p></div>
<a href="{{ route('transactions.create') }}" class="btn btn-dark">+ Tambah transaksi</a>
</div>
<div class="metrics">
@foreach([
    ['Total pelanggan', number_format($summary['customers'], 0, ',', '.'), 'Pelanggan terdaftar'],
    ['Total transaksi', number_format($summary['transactions'], 0, ',', '.'), 'Seluruh periode'],
    ['Pendapatan', 'Rp '.number_format($summary['revenue'], 0, ',', '.'), 'Nilai sebelum pajak'],
    ['Pajak tercatat', 'Rp '.number_format($summary['tax'], 0, ',', '.'), 'Akumulasi pajak transaksi'],
] as [$label, $value, $note])
<div class="metric"><div class="metric-label">{{ $label }}</div><div class="metric-value">{{ $value }}</div><div class="metric-note">{{ $note }}</div></div>
@endforeach
</div>
<div class="overview-band">
<div><p>TOTAL NILAI TRANSAKSI</p><strong>Rp {{ number_format($summary['grand_total'], 0, ',', '.') }}</strong><p>Termasuk pajak · seluruh periode</p></div>
<a href="{{ route('reports.index') }}" class="btn">Lihat laporan bulanan &rarr;</a>
</div>
<section class="card" aria-labelledby="recent-title">
<div class="section-head"><div><h3 id="recent-title" class="mb-0">Transaksi terbaru</h3><p>Lima transaksi terakhir berdasarkan tanggal transaksi.</p></div><a href="{{ route('transactions.index') }}">Lihat semua &rarr;</a></div>
<div class="table-responsive"><table class="table"><caption class="visually-hidden">Daftar transaksi terbaru</caption>
<thead><tr><th scope="col">Tanggal</th><th scope="col">Pelanggan</th><th scope="col">Deskripsi</th><th scope="col" class="text-end">Total termasuk pajak</th></tr></thead>
<tbody>
@forelse($recentTransactions as $trx)
<tr><td class="text-nowrap muted">{{ $trx->transaction_date->format('d/m/Y') }}</td><td class="client-name">{{ $trx->customer?->name ?? 'Pelanggan tidak tersedia' }}</td><td>{{ $trx->description }}</td><td class="text-end money">Rp {{ number_format($trx->total_amount, 0, ',', '.') }}</td></tr>
@empty
<tr><td colspan="4" class="text-center py-5"><p class="muted">Belum ada transaksi. Mulai dengan mencatat transaksi pertama Anda.</p><a href="{{ route('transactions.create') }}" class="btn btn-dark">Tambah transaksi</a></td></tr>
@endforelse
</tbody></table></div>
</section>
<p class="footer-note">Pajak dihitung dari tarif yang Anda masukkan pada setiap transaksi.</p>
@endsection
