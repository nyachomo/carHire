<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car; // Make sure to include this line to import the Car model
use App\Models\User; // Import the User model
use App\Models\CarModel; // Import the CarModel model

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_models = CarModel::count();
        $total_cars = Car::count();
        $total_users = User::count();

        // For the car list table
        $cars = \App\Models\Car::with('carModel')->latest()->take(5)->get();

        return view('home', compact('total_models', 'total_cars', 'total_users', 'cars'));
    }
}
