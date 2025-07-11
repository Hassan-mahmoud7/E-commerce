<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        $limit = $this->faker->numberBetween(10,100);
        $time_used = $this->faker->numberBetween(0,$limit);
        return [
            'code' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'discount_percentage' => $this->faker->numberBetween(10,50),
            'start_date' => now()->addDay(random_int(1,4)),
            'end_date' => now()->addDay(random_int(1,4)),
            'limit' => $limit,
            'time_used' => $time_used,
            'status' => $this->faker->boolean(70),
        ];
    }
}
