<?php


namespace App\Http\Logic;


use App\Services\BiletixSoap\BiletixRequests\GetOptimalFares;

class OptimalFaresFunction
{
    static public function getOffersByCompany(array $params, string $companyName)
    {
        $biletix = BiletixApi::biletixConnect();
        $optimalFares = new GetOptimalFares($biletix);

        $optimalFares->setParams($params);
        $fares = $optimalFares->execute();

        $optimalFaresOffer = $fares->offers->GetOptimalFaresOffer;

        $minPrice = PHP_INT_MAX;
        $minPriceOffer = null;

        foreach ($optimalFaresOffer as $key => $offer) {
            if ($offer->ak != $companyName) {
                continue;
            }

            $totalPrice = $offer->total_price;
            if ($totalPrice > $minPrice) {
                continue;
            }

            $minPrice =  $totalPrice;
            $minPriceOffer = $offer;
        }

        return $minPriceOffer;
    }

    public static function prepareFaresToView($offer)
    {
        $fares = [];
        $fares['price'] = $offer->total_price;
        $fares['company'] = $offer->ak;
        foreach ($offer->directions->GetOptimalFaresDirection as $direction) {
            if ($direction->direction == 'TO') {
                $fares['path']['to'] = self::prepareGetOptimalFaresFlight($direction->flights->GetOptimalFaresFlight);
            }

            if ($direction->direction == 'BACK') {
                $fares['path']['back'] = self::prepareGetOptimalFaresFlight($direction->flights->GetOptimalFaresFlight);
            }
        }

        return $fares;
    }

    public static function prepareGetOptimalFaresFlight($optimalFaresFlight)
    {
        $result = [];

        if (!is_array($optimalFaresFlight)) {
            $result[] = self::createArrayFromAirSegment($optimalFaresFlight->segments->AirSegment);
            return $result;
        }

        foreach ($optimalFaresFlight as $key => $flight) {
            $result[$key] = self::createArrayFromAirSegment($flight->segments->AirSegment);
        }

        return $result;
    }

    public static function createArrayFromAirSegment($airSegment): array
    {
        return [
            'company'       => $airSegment->ak_full_name,
            'flightNumber'  => $airSegment->flight_number,
            'departureTime' => $airSegment->departure_time,
            'arrivalTime'   => $airSegment->arrival_time,
            'flightTime'    => DateFunction::calculateDiffBetweenHours($airSegment->arrival_utc, $airSegment->departure_utc),
            'departureDate' => DateFunction::convertDateToNeedleFormat($airSegment->departure_date),
            'arrivalDate'   => DateFunction::convertDateToNeedleFormat($airSegment->arrival_date),
        ];
    }


}
