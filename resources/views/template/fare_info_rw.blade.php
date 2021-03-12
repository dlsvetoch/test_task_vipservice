@extends('layouts.main')

@section('css_block')
    <link rel="stylesheet" href="{{ asset("css/fare.css") }}">
@endsection

@foreach($flightInfo['path'] as $key => $path)
    <div class="fare">
        <div class="fare-info">
            @foreach($path as $keyDirection => $fareItem)
                <div class="fare-company">
                    <div class="company">
                        <span>
                            {{ $fareItem['company'] }}
                        </span>
                    </div>
                </div>
                <div class="from-info">
                    <div class="direction-from">
                        <span>
                            {{ $key == 'to' ? $cityCodes[$flightInfo['direction']['from']] : $cityCodes[$flightInfo['direction']['to']] }}
                        </span>
                        <div class="departure-date">
                            <span>вылет {{ $fareItem['departureDate'] }}</span>
                        </div>
                        <div class="flight-number">Номер рейса: {{ $fareItem['flightNumber'] }}</div>
                    </div>
                </div>
                <div class="time-info">
                    <div class="time-line">
                        <div class="departure-time">{{ $fareItem['departureTime'] }}</div>
                        <div class="city-code">{{ $key == 'to' ? $flightInfo['direction']['from'] :$flightInfo['direction']['to'] }}</div>
                        <div class="line"></div>
                        <div class="city-code">{{ $key == 'to' ? $flightInfo['direction']['to'] :$flightInfo['direction']['from'] }}</div>
                        <div class="arrival-time">{{ $fareItem['arrivalTime'] }}</div>
                    </div>
                    <div class="flight-time">
                        {{ $fareItem['flightTime'] }}
                    </div>
                </div>
                <div class="to-info">
                    <div class="direction-to">
                        <span>
                            {{ $key == 'to' ? $cityCodes[$flightInfo['direction']['to']] : $cityCodes[$flightInfo['direction']['from']] }}
                        </span>
                        <div class="arrival-date">
                            <span>прилет {{ $fareItem['arrivalDate'] }}</span>
                        </div>
                    </div>
                </div>
                @break
            @endforeach
        </div>
    </div>
@endforeach
