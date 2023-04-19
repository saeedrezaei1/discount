<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'code' => fake()->password(6,9),
            'discount' => fake()->randomNumber(2,100),
            'max_uses' => fake()->randomNumber(2,100),
            'valid_from' => now(),
            'valid_to' => fake()->dateTimeBetween(now(), now()->addDays(30) )
        ];
    }
}
