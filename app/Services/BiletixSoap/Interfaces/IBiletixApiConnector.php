<?php


namespace App\Services\BiletixSoap\Interfaces;

use SoapClient;

interface IBiletixApiConnector
{
    public function startSession(): self;
    public function getSessionToken(): string;
    public function getSoapClient(): SoapClient;
}
