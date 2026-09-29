<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::with('customer')
            ->when($request->month, fn ($q, $month) => $q->whereMonth('transaction_date', $month))
            ->when($request->year, fn ($q, $year) => $q->whereYear('transaction_date', $year))
            ->latest('transaction_date')
            ->paginate(10)
            ->withQueryString();

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $customers = Customer::orderBy('name')->get();
        return view('transactions.create', compact('customers'));
    }

    public function store(Request $request)
    {
        Transaction::create($this->transactionData($request));
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit(Transaction $transaction)
    {
        $customers = Customer::orderBy('name')->get();
        return view('transactions.edit', compact('transaction', 'customers'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($this->transactionData($request));
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }

    private function transactionData(Request $request): array
    {
        $data = $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'transaction_date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:0'],
            'tax_rate' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);

        $data['tax_amount'] = round($data['amount'] * ($data['tax_rate'] / 100), 2);
        $data['total_amount'] = round($data['amount'] + $data['tax_amount'], 2);

        return $data;
    }
}
