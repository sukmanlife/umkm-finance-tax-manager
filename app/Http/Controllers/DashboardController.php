<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $summary = [
            'customers' => Customer::count(),
            'transactions' => Transaction::count(),
            'revenue' => Transaction::sum('amount'),
            'tax' => Transaction::sum('tax_amount'),
            'grand_total' => Transaction::sum('total_amount'),
        ];

        $recentTransactions = Transaction::with('customer')
            ->latest('transaction_date')
            ->latest('id')
            ->take(5)
            ->get();

        return view('dashboard.index', compact('summary', 'recentTransactions'));
    }
}
