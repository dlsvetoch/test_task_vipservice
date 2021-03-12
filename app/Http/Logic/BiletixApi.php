<?php


namespace App\Http\Logic;


use App\Services\BiletixSoap\BiletixConnector;
use App\Services\BiletixSoap\Interfaces\IBiletixApiConnector;
use App\Services\BiletixSoap\StartSessionInput;

class BiletixApi
{
    /*
        Я знаю подобную информацию лучше хранить в БД, но думаю в рамках этого тестового, я немного принебрегу этим
        принципом =).
    */
    const CITY_CODES = [
        'MOW' => 'Москва',
        'LED' => 'Санкт-Петербург'
    ];

    public static function biletixConnect(): IBiletixApiConnector
    {
        return new BiletixConnector(self::startSession());
    }

    public static function startSession(): StartSessionInput
    {
        $startSessionInput = new StartSessionInput();
        $startSessionInput
            ->setLogin('[partner]||SOAPTEST')
            ->setPassword('[partner]||SOAPTEST')
            ->setHash('[partner]||SOAPTEST')
            ->setDisableHash('Y');

        return $startSessionInput;
    }
}
