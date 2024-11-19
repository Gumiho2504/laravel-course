<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImages;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CarType::factory()
            ->sequence(

                ['name' => 'Sedan'],
                ['name' => 'Hatchback'],
                ['name' => 'SUV'],
                ['name' => 'Pickup Truck'],
                ['name' => 'Minivan'],
                ['name' => 'Jeep'],
                ['name' => 'Sport Car'],
                ['name' => 'Crossover'],
                ['name' => 'Coupe'],

            )
            ->count(9)
            ->create();

        FuelType::factory()
            ->sequence(
                ['name' => 'Gasoline'],
                ['name' => 'Diesel'],
                ['name' => 'Electric'],
                ['name' => 'Hybrid'],
            )
            ->count(4)
            ->create();

        $states = [
            'California' => ['Los Angeles', 'San Francisco', 'San Diego', 'Sacramento'],
            'Texas' => ['Houston', 'Dallas', 'Austin', 'San Antonio'],
            'Florida' => ['Miami', 'Orlando', 'Tampa', 'Jacksonville'],
            'New York' => ['New York City', 'Buffalo', 'Rochester', 'Albany'],
            'Illinois' => ['Chicago', 'Springfield', 'Naperville', 'Peoria'],
            'Pennsylvania' => ['Philadelphia', 'Pittsburgh', 'Allentown', 'Erie'],
            'Ohio' => ['Columbus', 'Cleveland', 'Cincinnati', 'Toledo'],
            'Georgia' => ['Atlanta', 'Savannah', 'Augusta', 'Macon'],
            'North Carolina' => ['Charlotte', 'Raleigh', 'Durham', 'Greensboro'],
            'Michigan' => ['Detroit', 'Grand Rapids', 'Ann Arbor', 'Lansing']
        ];


        foreach ($states as $state => $cities) {
            State::factory()
                ->state(
                    ['name' => $state]
                )
                ->has(
                    City::factory()
                        ->count(count($cities))
                        ->sequence(
                            ...array_map(fn($city) => ['name' => $city], $cities)
                        )
                )
                ->create();
        }

        $makers = [
            'Toyota' => ['Camry', 'Corolla', 'RAV4', 'Highlander'],
            'Ford' => ['F-150', 'Mustang', 'Explorer', 'Focus'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot'],
            'Chevrolet' => ['Silverado', 'Malibu', 'Equinox', 'Tahoe'],
            'Nissan' => ['Altima', 'Sentra', 'Rogue', 'Pathfinder']
        ];

        foreach ($makers as $maker => $models) {
            Maker::factory()
                ->has(
                    Model::factory()
                        ->count(count($models))
                        ->sequence(...array_map(fn($model) => ['name' => $model], $models))
                )
                ->create();
        }



        User::factory()
            ->count(3)
            ->create();

        User::factory()
            ->count(2)
            ->has(
                Car::factory()
                    ->count(50)
                    ->has(
                        CarImages::factory()
                            ->count(5)
                            ->sequence(fn(Sequence $s) => ['position' => $s->index % 5 + 1]),
                        'images'
                    )
                    ->hasFeatures(),
                'favouriteCars'
            )
            ->create();
    }
}
