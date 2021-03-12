<?php


namespace App\Services\BiletixSoap;

use SoapClient;
use App\Services\BiletixSoap\Interfaces\IBiletixApiConnector;

class BiletixConnector implements IBiletixApiConnector
{
    private $sessionInput;
    private $sessionToken;
    private $url;
    private $soapClient;

    public function __construct(StartSessionInput $session, string $url = '')
    {
        $this->sessionInput = $session;
        $this->url = $url ?: 'http://biletix.ru/bitrix/components/travelshop/ibe.soap/travelshop_booking.php?wsdl';
        $this->soapClient = new SoapClient($this->url, [
            "trace" => 1,
            "exception" => 0,
        ]);
    }

    public function startSession(): self
    {
        $session = $this->soapClient->startSession($this->sessionInput);
        $this->sessionToken = $session->session_token;

        return $this;
    }

    /**
     * @return string
     */
    public function getSessionToken(): string
    {
        return $this->sessionToken;
    }

    /**
     * @return SoapClient
     */
    public function getSoapClient(): SoapClient
    {
        return $this->soapClient;
    }


}
