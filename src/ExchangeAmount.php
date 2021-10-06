<?php

namespace Abyzs\PrivatCoolLib;


class ExchangeAmount
{
    private $url = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';
    private $EUR;
    private $USD;
    private $RUB;

    private function curl (): array {
        $curl= curl_init();
        curl_setopt_array($curl,array(
                CURLOPT_URL => $this->url,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_RETURNTRANSFER =>true,
                CURLOPT_HTTPHEADER => array('Content-Type:application/json','X-REST-API-KEY: dce26797a38f82a6f719afa54dea4ab4'),
            )
        );
        $result = json_decode(curl_exec($curl),true);

        return $result;
    }

    private function usd (): array {
        $this->USD = $this->curl()[0];
        return $this->USD;
    }

    private function eur (): array {
        $this->EUR = $this->curl()[1];
        return $this->EUR;
    }

    private function rub (): array {
        $this->RUB = $this->curl()[2];
        return $this->RUB;
    }

    public function toDecimal ($from, $to, $amount): float
    {
        switch ($from) {
            case "EUR":
                $eur = $this->eur()['sale'];
                $from_Currency = $amount * $eur;
                break;
            case "USD":
                $usd = $this->usd()['sale'];
                $from_Currency = $amount * $usd;
                break;
            case "RUB":
                $rub = $this->rub()['sale'];
                $from_Currency = $amount * $rub;
                break;
            case "UAH":
                $from_Currency = $amount;
                break;
        }

        switch ($to) {
            case "EUR":
                $eur = $this->eur()['buy'];
                $to_Currency = $from_Currency / $eur;
                break;
            case "USD":
                $usd = $this->usd()['buy'];
                $to_Currency = $from_Currency / $usd;
                break;
            case "RUB":
                $rub = $this->rub()['buy'];
                $to_Currency = $from_Currency / $rub;
                break;
            case "UAH":
                $to_Currency = $from_Currency;
                break;
        }
        return round($to_Currency, 3);
    }
}



