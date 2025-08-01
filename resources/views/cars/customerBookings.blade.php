
@extends('layouts.frontend')
@section('content')
<div class="hero inner-page" style="background-image: url('frontend/images/hero_1_a.jpg');">
    <div class="container">
        <div class="row align-items-end ">
            <div class="col-lg-5">
                <div class="intro">
                    <h1><strong>My Bookings</strong></h1>
                    <div class="custom-breadcrumbs"><a href="{{route('home')}}">Home</a> <span class="mx-2">/</span> <strong>My Bookings</strong></div>
                </div>
            </div>
        </div>
    <div class="site-section">
      <div class="container">
        <div class="row">
          
           <table class="table table-sm table-striped">
             <thead>
                  <th>#</th>
                  <th>Car Model</th>
                  <th>Total Days</th>
                  <th>Total Km</th>
                  <th>Rate Per Day</th>
                  <th>Rate Per Km</th>
                  <th>Amount To Pay</th>
                  <th>Action</th>


             </thead>

             <tbody>
                @foreach($bookedCars as $key=>$bookedCar)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$bookedCar->car->make}}</td>
                    <td>{{$bookedCar->total_days}}</td>
                    <td>{{$bookedCar->total_km ?? 'NA'}}</td>
                    <td>{{$bookedCar->car->rate_per_day ?? 'NA'}}</td>
                    <td>{{$bookedCar->car->rate_per_km ?? 'NA'}}</td>
                    <td>{{$bookedCar->amount_to_pay ?? 'NA'}}</td>
                    <td>
                          <button type="button" class="btn  btn-info">Make Payment</button>
                          <button type="button" class="btn  btn-secondary">Download Receipt</button>
                    </td>
                </tr>
                @endforeach
               
             </tbody>
           </table>
        </div>
      </div>
    </div>
    </div>
@endsection
