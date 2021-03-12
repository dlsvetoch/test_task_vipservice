<?php


namespace App\Services\BiletixSoap\BiletixRequests;

use App\Services\BiletixSoap\Interfaces\IApiRequest;
use App\Services\BiletixSoap\Interfaces\IBiletixApiConnector;

class GetOptimalFares implements IApiRequest
{
    private $biletix;

    private $params;

    public function __construct(IBiletixApiConnector $biletix)
    {
        $this->biletix = $biletix;
    }

    public function setParams(array $params): self
    {
        $this->params = $params;

        return $this;
    }

    public function execute()
    {
        $this->biletix->startSession();
        $soapClient = $this->biletix->getSoapClient();
        $requestParams = $this->prepareParamsForRequest($this->params);

        return $soapClient->GetOptimalFares($requestParams);
    }

    private function prepareParamsForRequest(array $params)
    {
        $sessionToken = $this->biletix->getSessionToken();

        $hash = $sessionToken;
        foreach ($params as $param) {
            $hash .= $param;
        }

        return ['session_token' => $sessionToken] + $params + ['hash' => md5($hash)];
    }
}
