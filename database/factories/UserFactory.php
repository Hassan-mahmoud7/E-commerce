<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $country = Country::inRandomOrder()->first();
        if (!$country) {
            throw new \Exception("No countries found! please seed the countries table.");
        }
        $governorate = $country->governorates()->inRandomOrder()->first();
        if (!$governorate) {
            throw new \Exception("No governorates found for country {$country->id}! please seed the governorates table.");
        }
        $city = $governorate->cities()->inRandomOrder()->first();
        if (!$city) {
            throw new \Exception("No cities found for governorate {$governorate->id}! please seed the cities table.");
        }
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => fake()->phoneNumber(),
            'status' => random_int(0,1),
            'country_id' => $country->id,
            'governorate_id' => $governorate->id,
            'city_id' => $city->id,
            'image' => asset('assets/img/uploads/users/user_profile.jpg'),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
