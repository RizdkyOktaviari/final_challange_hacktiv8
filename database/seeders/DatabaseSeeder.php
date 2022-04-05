<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\DetailTransaction;
use App\Models\Produk;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // Kategori::factory(10)->create();
        // Produk::factory(50)->create();
        // Transaction::factory(50)->create();
        DetailTransaction::factory(100)->create();
    }
}