@extends('layouts.main')

@section('title')
Test task for Vipservice
@endsection

@section('content')
    <div class="content">
        <div class="fare-wrapper">
            <div class="fares">
                @include('template.fare_info_rw')
            </div>
            <div class="fare-price">
                <div class="price">
                    <span>
                        {{ $flightInfo['price'] }}р.
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
