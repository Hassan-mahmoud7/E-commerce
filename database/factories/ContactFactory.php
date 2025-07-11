<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
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
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'subject' => fake()->sentence(3),
            'message' => fake()->paragraph(3),
            'replay_status' => random_int(0,1),
            'is_read' => random_int(0,1),
            'is_starred' => random_int(0,1),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
