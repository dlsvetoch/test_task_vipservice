<?php


namespace App\Services\BiletixSoap;


class StartSessionInput
{
    public $login;
    public $password;
    public $hash;
    public $disable_hash;
    public $additional_data;
    public $currency;

    /**
     * @param string $login
     */
    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @param string $disable_hash
     */
    public function setDisableHash(string $disable_hash): self
    {
        $this->disable_hash = $disable_hash;

        return $this;
    }

    /**
     * @param string $additional_data
     */
    public function setAdditionalData(string $additional_data): self
    {
        $this->additional_data = $additional_data;

        return $this;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }


}
