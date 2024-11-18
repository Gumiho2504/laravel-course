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
//        // select all car
//        $cars = Car::all();
//        // Select published Cars
//        $cars = Car::where('published_at', '!=',null)->get();
//
//        // Select first car
//        $car = Car::where('published_at', '!=',null)->first();

        // select car by id
 //       $car = Car::find(2);
//        $cars = Car::orderBy('published_at', 'desc')
//            ->limit(2)
//            ->where('user_id' ,1)
//            ->get();
 //       dump($cars);
    $carData = [
        'maker_id'=>2,
        'model_id'=>2,
        'year'=>1999,
        'price'=>1000,
        'mileage'=> 100,
        'car_type_id'=> 2,
        'fuel_type_id'=>4,
        'user_id'=> 1,
        'city_id'=> 2,
        'address'=> "Gumih",
        'phone'=> "123455",
        'description'=> "Phonix",
        'published_at' => now()
    ];

    // Approach 1
    Car::create($carData);

    // Approach 2
        $car2 = new Car();
        $car2->fill($carData);
    // Approach 3
        $car3 = new Car($carData);
        $car3->save();

        return view('home.index')
            ->with('firstName','Home')
            ->with('lastName','Home');

    }
}
