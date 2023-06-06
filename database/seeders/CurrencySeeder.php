<?php

namespace Database\Seeders;

use App\Models\Currencies;
use App\Models\PaymentDetails;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentDetails::create([
            'wallet_address_type' => 'USDT-TRC20',
            'wallet_address' => 'qfrqerfq3rfq34fq3'
        ]);

        PaymentDetails::create([
            'wallet_address_type' => 'USDT-ERC20',
            'wallet_address' => 'qfrqerfq3rfq34fq3'
        ]);

        Currencies::factory(60)->create();
    }
}
