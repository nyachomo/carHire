
@extends('layouts.frontend')

@section('content')
<div class="hero" style="background-image: url('frontend/images/hero_1_a.jpg');">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-10">
        <div class="row mb-5">
          <div class="col-lg-7 intro">
            <h1><strong>Hire a car</strong> is within your finger tips.</h1>
          </div>
        </div>
        <form class="trip-form" method="POST" action="{{ route('searchCar.index') }}">
          @csrf
          <div class="row align-items-center">
            <div class="mb-3 mb-md-0 col-md-6">
              <select name="car_model_id" id="car_model_id" class="custom-select form-control" required>
                <option value="">Select Model</option>
                @if(!empty($carModels))
                  @foreach($carModels as $carModel)
                    <option value="{{ $carModel->id }}">{{ $carModel->name ?? 'NA'}}</option>
                  @endforeach
                  @endif
              </select>
            </div>
            <!-- <div class="mb-3 mb-md-0 col-md-3">
              <div class="form-control-wrap">
                <input type="text" id="cf-3" placeholder="Pick up" class="form-control datepicker px-3">
                <span class="icon icon-date_range"></span>
              </div>
            </div>
            <div class="mb-3 mb-md-0 col-md-3">
              <div class="form-control-wrap">
                <input type="text" id="cf-4" placeholder="Drop off" class="form-control datepicker px-3">
                <span class="icon icon-date_range"></span>
              </div>
            </div> -->
            <div class="mb-3 mb-md-0 col-md-6">
              <input type="submit" value="Search Now" class="btn btn-primary btn-block py-3">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-primary py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7 mb-4 mb-md-0">
        <h2 class="mb-0 text-white">What are you waiting for?</h2>
        <p class="mb-0 opa-7">Click "Rent a car now" to rent your dream car.</p>
      </div>
      <div class="col-lg-5 text-md-right">
        <a href="#" class="btn btn-primary btn-white">Rent a car now</a>
      </div>
    </div>
  </div>
</div>


<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2 class="section-heading"><strong>Car Listings</strong></h2>
        <p class="mb-5">Browse our available cars below.</p>
      </div>
    </div>
    <div class="row">
      @foreach($cars as $car)
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="listing d-block align-items-stretch">
          <div class="listing-img h-100 mr-4">
            @if($car->image)
              <img src="{{ asset('images/' . $car->image) }}" alt="Image" class="img-fluid">
            @else
              <img src="{{ asset('images/default-car.png') }}" alt="No Image" class="img-fluid">
            @endif
          </div>
          <div class="listing-contents h-100">
            <h3>{{ $car->make }} {{ $car->carModel->name ?? $car->model }}</h3>
            <div class="rent-price">
              <strong>Ksh {{ number_format($car->rate_per_day) }}</strong><span class="mx-1">/</span>day |
              <strong>Ksh {{ number_format($car->rate_per_km) }}</strong><span class="mx-1">/</span>Km
            </div>
            <div class="d-block d-md-flex mb-3 border-bottom pb-3">
              <div class="listing-feature pr-4">
                <span class="caption">Year:</span>
                <span class="number">{{ $car->year }}</span>
              </div>
              <div class="listing-feature pr-4">
                <span class="caption">Color:</span>
                <span class="number">{{ $car->color }}</span>
              </div>
              <div class="listing-feature pr-4">
                <span class="caption">Reg:</span>
                <span class="number">{{ $car->registration_number }}</span>
              </div>
            </div>
            <div>
              <p><a href="{{ route('carDetails', ['car_id' => $car->id]) }}" class="btn btn-primary btn-sm">Rent(Per Day)</a></p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection

