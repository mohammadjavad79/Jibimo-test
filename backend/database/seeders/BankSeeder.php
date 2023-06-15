<?php

namespace Database\Seeders;

use App\Models\Bank\Bank;
use App\Services\Banks\ABank;
use App\Services\Banks\BBank;
use App\Services\Banks\CBank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banks = [
            [
                Bank::NAME => 'A bank',
                Bank::SERVICE_CLASS => ABank::class,
            ],
            [
                Bank::NAME => 'B bank',
                Bank::SERVICE_CLASS => BBank::class,
            ],
            [
                Bank::NAME => 'C bank',
                Bank::SERVICE_CLASS => CBank::class,
            ],
        ];

            Bank::insert($banks);
    }
}
