<?php

namespace App\Http\Controllers;

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
use Illuminate\Http\Request;
use function Illuminate\Events\queueable;

class HomeController extends Controller
{
        public function index()
        {
            return Car::get();
                //        $car = Car::find(1);
                //        $car->features->abs = 0;
                //        dump($car->features,$car->primaryImage);
                //        $car->features->save();


                //        $car = Car::find(1);


                //        // Create new image
                //        $image = new CarImages(['image_path' =>'somtiing','position'=>'3']);
                //        $car->images()->save($image);
                //        dump($car->images);
                //        $car->images()->create(['image_path' =>'somtiing','position'=>'4']);
                //        $car->images()->saveMany([
                //            new CarImages(['image_path' =>'somtiing','position'=>'5']),
                //            new CarImages(['image_path' =>'somtiing','position'=>'6'])
                //        ]);
                //        $car->images()->createMany([
                //            ['image_path' =>'somtiing','position'=>'7'],
                //            ['image_path' =>'somtiing','position'=>'8'],
                //        ]);

                //        $car = Car::find(1);
                //        dd($car->carType);

                //        $car = Car::find(1);
                //        $carType = CarType::where('name','Jeep' )->first();

                // change cartype id of the car
                //        $car->car_type_id = $carType->id;
                //        $car->save();

                //        $car->carType()->associate($carType);
                //        $car->save();
                //  $cars = $carType->cars;
                //  $cars = Car::whereBelongsTo($carType)->get();
                //  dd($cars);


                ///// Many to Many

                //        $car = Car::find(1);
                //        dd($car->favouredUsers);
                //        $user = User::find(1);
                //        dd($user->favouriteCars);
                //        $user = User::find(1);
                // at favourite car to user by car id
                // $user->favouriteCars()->attach([1,2]);
                // delete all value in favourite car and create new one
                //        $user->favouriteCars()->sync([3]);

                // delete favourite car from user
                ///        $user->favouriteCars()->detach([1,2]);




                ///##### FACTORY
                //        $maker =  Maker::factory()->count(4)->create();
                //        dd($maker);
                //        $user =   User::factory()
                //            ->count(10)
                //            ->make([
                //            'name' => 'metrey'
                //        ]);
                //        dd($user);

                #### sequence

                //        User::factory()->count(10)
                //            ->sequence(
                //            ['name' => 'Gumiho'],
                //            ['name' => 'Metrey']
                //        )
                //           ->sequence(fn (Sequence $sequence) => ['name'=> 'name'.$sequence->index])
                //        ->create();


                ###### State
                //        User::factory()->count(10)
                //            ->state(
                //                ['email_verified_at' => null]     // can user -> unverified(). ; it the same
                //            )
                //            //->unverified().
                //            //->trashed() //. will provide some value inside delete
                //            ->create();


                ##### CallBack
                //        User::factory()
                //            ->afterCreating(function ($user) {
                //                dump($user);
                //            })
                //            ->create();


                ### onetomany relationship factory

                //        Maker::factory()
                //            ->count(1)
                //        //    ->hasModels(5)       //has +relationship function name with uppercase at first latter
                //        //    ->hasModels(1,['name'=>'test'])
                //        //    ->hasModels(1,function (array $attributes,Maker $maker){
                //        //          return [];
                //        //      })
                //            ->has(Model::factory()->count(3))    // if we create 1 maker have 3 model
                //            ->create();

                ### Belongs To Relationship factory
                // $makers = Maker::factory()->create();
                // Model::factory()
                //         ->count(5)
                //         ->for($makers)
                //         //->forMaker(['name' => 'wookie'])  // for + relationship function name with uppercase at first latter
                //         //->for(Maker::factory()->state(['name'=>'Lexus']))
                //         ->create();

                ### Many To Many Relationship factory
                // User::factory()
                //         ->has(Car::factory()->count(5), 'favouriteCars')
                //         //->hasAttached(Car::factory()->count(5),['col1'=>'va'], 'favouriteCars')
                //         ->create();
                //Car::factory()->count(5)->create();
                //CarType::factory()->count(4)->create();
                // City::factory()->count(5)
                //         ->forState()
                //         ->create();
                // State::factory()->count(5)->create();
                //FuelType::factory()->count(4)->create();
                // Maker::factory()->hasModels(3)->create();

                $cars = Car::where('published_at', '<', now())
                        ->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model'])
                        ->orderBy('published_at', 'desc')
                        ->limit(30)
                        ->get();
                dump($cars);
                return view('home.index', ['cars' => $cars]);
        }
}
