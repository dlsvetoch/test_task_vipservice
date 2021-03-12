<?php


namespace App\Http\Controllers;

use App\Http\Logic\OptimalFaresFunction;
use Illuminate\Support\Facades\View;
use App\Http\Logic\BiletixApi;

class IndexController extends Controller
{
    public function index()
    {
        $direction = [
            'from' => 'MOW',
            'to'   => 'LED',
        ];

        $fares = OptimalFaresFunction::getOffersByCompany([
            'departure_point'   => $direction['from'],
            'arrival_point'     => $direction['to'],
            'outbound_date'     => '13.03.2021',
            'return_date'       => '15.03.2021',
            'adult_count'       => 1,
            'owrt'              => 'RT',
            'return_full_names' => 'true',
        ], 'S7');

        $flightInfo = OptimalFaresFunction::prepareFaresToView($fares);
        $flightInfo['direction'] = $direction;

        return View::make('index', [
            'flightInfo' => $flightInfo,
            'cityCodes'  => BiletixApi::CITY_CODES
        ]);
    }
}
