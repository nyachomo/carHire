<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class BookingController extends Controller
{
    //

    public function bookCarPerDay(Request $request){
        $amount_to_pay=$request->total_days*$request->rate_per_day;
        $create=Booking::create([
            'user_id'=>$request->user_id,
            'car_id'=>$request->car_id,
            'total_days'=>$request->total_days,
            'amount_to_pay'=>$amount_to_pay,
        ]);

        if($create){
            alert()->success('Success','Car Booked Successfully');

            return redirect()->back();
        }else{
            alert()->error('Error','Failed could not booked');

            return redirect()->back();
        }
    }

    public function customerBookings(){
        $bookedCars=Booking::with('car')->where('user_id',Auth::user()->id)->get();
        return view('cars.customerBookings',compact('bookedCars'));
    }
}
