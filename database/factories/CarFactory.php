<?php

namespace Database\Factories;

use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{

    public function definition(): array
    {
        $maker = Maker::inRandomOrder()->first();
        $model = $maker ? Model::where('maker_id', $maker->id)->inRandomOrder()->first() : null;
        $user = User::inRandomOrder()->first();

        return [
            'maker_id' => $maker?->id, // Use null-safe operator
            'model_id' => $model?->id, // Use null-safe operator
            'year' => fake()->year(),
            'price' => ((int) fake()->randomFloat(2, 5, 100)) * 1000,
            'vin' => strtoupper(Str::random(17)),
            'mileage' => ((int) fake()->randomFloat(2, 5, 500)) * 1000,
            'car_type_id' => CarType::inRandomOrder()->first()?->id,
            'user_id' => $user?->id,
            'city_id' => City::inRandomOrder()->first()?->id,
            'fuel_type_id' => FuelType::inRandomOrder()->first()?->id,
            'address' => fake()->address(),
            'phone' => $user?->phone, // Null-safe operator
            'description' => fake()->text(2000),
            'published_at' => fake()->optional(0.9)->dateTimeBetween('-1 month', '+1 day'),
        ];
    }
}
