<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CurrenciesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $currencyTypes = collect(['BTC', 'ETH', 'USDT']);
        $currencyType = $currencyTypes->random();

        $currency = [
            'name' => $currencyType,
            'percentage' => fake()->randomFloat(2, 0.1, 1)
        ];

        if($currencyType === "BTC") {
            $currency['amount'] = $this->faker->randomFloat(2, 26000, 27000);
        }

        if($currencyType === "ETH") {
            $currency['amount'] = $this->faker->randomFloat(2, 1500, 2500);
        }

        if($currencyType === "USDT") {
            $currency['amount'] = $this->faker->randomFloat(3, 1.01, 1.1);
        }

        return $currency;


    }
}
