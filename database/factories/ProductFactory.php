<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = rand(1, 3);
        return [
            'name' => fake()->words(2, true),
            'quantity' => fake()->randomFloat(2, 1, 30),
            'packaging' => 'Kilo',
            'price_ht' => fake()->randomFloat(2, 1, 10),
            'tva' => 20.00,
            'margin_rate' => 20.00,
            'price_ttc' => 20.00,
            'created_by' => rand(1, 10),
            'deleted_at' => $status === 2 ? Carbon::now() : null,
            'status_id' => $status,
            'supplier_id' => rand(1, 10),
        ];
    }
}
