<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $year = (int) ($request->year ?: now()->year);

        $rows = Transaction::query()
            ->selectRaw('(substr(transaction_date, 6, 2) + 0) as month')
            ->selectRaw('COUNT(*) as transaction_count')
            ->selectRaw('SUM(amount) as revenue')
            ->selectRaw('SUM(tax_amount) as tax')
            ->selectRaw('SUM(total_amount) as total')
            ->whereYear('transaction_date', $year)
            ->groupByRaw('(substr(transaction_date, 6, 2) + 0)')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        return view('reports.index', compact('rows', 'year'));
    }
}
