<?php


namespace App\Http\Logic;


use Carbon\Carbon;

class DateFunction
{
    CONST MONTH_CODES = [
        '01' => 'янв.',
        '02' => 'фев.',
        '03' => 'мар.',
        '04' => 'апр.',
        '05' => 'мая',
        '06' => 'июня',
        '07' => 'июля',
        '08' => 'авг.',
        '09' => 'сен.',
        '10' => 'окт.',
        '11' => 'ноя.',
        '12' => 'дек.',
    ];

    public static function calculateDiffBetweenHours(string $from, string $to): string
    {
        $startDate = Carbon::createFromFormat('d.m.Y H:i:s', $from);
        $endDate = Carbon::createFromFormat('d.m.Y H:i:s', $to);

        return $endDate->diff($startDate)->format('%hч %iм');

    }

    public static function convertDateToNeedleFormat(string $date): string
    {
        $dateToArray = explode('.', $date);
        $dateToArray[1] = self::convertMonthToRussianName($dateToArray[1]);

        return implode(' ', $dateToArray);
    }

    public static function convertMonthToRussianName(string $monthNumber): string
    {
        return self::MONTH_CODES[$monthNumber];
    }
}
