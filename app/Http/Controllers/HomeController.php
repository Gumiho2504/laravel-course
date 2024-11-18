<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImages;
use App\Models\CarType;
use App\Models\Maker;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
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
     $user =   User::factory()->count(10)->make([
            'name' => 'metrey'
        ]);
        dd($user);

        return view('home.index');

    }
}
