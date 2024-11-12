<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
//        return view('home.index',[
//            'firstName' => 'Hem',
//            'lastName' => 'Chanmetrey'
//
//        ]);

        return view('home.index')
            ->with('firstName','Home')
            ->with('lastName','Home');

    }
}
