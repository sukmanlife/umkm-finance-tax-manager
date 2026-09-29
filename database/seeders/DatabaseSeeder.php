<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin Demo', 'password' => Hash::make('password')]
        );

        $customer = Customer::create([
            'name' => 'Toko Maju Jaya',
            'email' => 'owner@example.com',
            'phone' => '081234567890',
            'address' => 'Indonesia',
        ]);

        foreach ([
            ['description' => 'Website company profile', 'amount' => 2500000, 'tax_rate' => 2],
            ['description' => 'Maintenance website', 'amount' => 750000, 'tax_rate' => 1],
        ] as $index => $row) {
            $tax = $row['amount'] * ($row['tax_rate'] / 100);
            Transaction::create([
                'customer_id' => $customer->id,
                'transaction_date' => now()->subDays($index * 7)->toDateString(),
                'description' => $row['description'],
                'amount' => $row['amount'],
                'tax_rate' => $row['tax_rate'],
                'tax_amount' => $tax,
                'total_amount' => $row['amount'] + $tax,
            ]);
        }
    }
}
