<?php

namespace Abyzs\PrivatCoolLib;


class ExchangeAmount
{
    private $url = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';
    private $EUR;
    private $USD;
    private $RUB;
    private $BTC;

    public function curl (): array {
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
        $curl = $this->curl();
        foreach ($curl as $value) {
            if ($value['ccy'] == 'USD') {
                $this->USD = $value;
            }
        };
        return $this->USD;
    }

    private function eur (): array {
        $curl = $this->curl();
        foreach ($curl as $value) {
            if ($value['ccy'] == 'EUR') {
                $this->EUR = $value;
            }
        };
        return $this->EUR;
    }

    private function rub (): array {
        $curl = $this->curl();
        foreach ($curl as $value) {
            if ($value['ccy'] == 'RUR') {
                $this->RUB = $value;
            }
        };
        return $this->RUB;
    }

    private function btc (): array {
        $curl = $this->curl();
        foreach ($curl as $value) {
            if ($value['ccy'] == 'BTC') {
                $this->BTC = $value;
            }
        };
        return $this->BTC;
    }

    public function toDecimal ($from, $to, $amount): float
    {
        switch ($from) {
            case "EUR":
                $eurSale = $this->eur()['sale'];
                $from_Currency = $eurSale * $amount;
                break;
            case "USD":
                $usdSale = $this->usd()['sale'];
                $from_Currency = $usdSale * $amount;
                break;
            case "RUB":
                $rubSale = $this->rub()['sale'];
                $from_Currency = $rubSale * $amount;
                break;
            case "UAH":
                $from_Currency = $amount;
                break;
            case "BTC":
                $btcSale = $this->btc()['sale'];
                $from_Currency = $btcSale * $amount;
                break;
        }

        switch ($to) {
            case "EUR":
                $eurBuy = $this->eur()['buy'];
                if ($from == 'BTC') {
                    $usdSale = $this->usd()['sale'];
                    $uah = $from_Currency * $usdSale;

                    $to_Currency = $uah / $eurBuy;
                } else {
                    $to_Currency = $from_Currency / $eurBuy;
                }
                break;
            case "USD":
                $usdBuy = $this->usd()['buy'];
                if ($from == 'BTC') {
                    $to_Currency = $from_Currency;
                } else {
                    $to_Currency = $from_Currency / $usdBuy;
                }
                break;
            case "RUB":
                $rubBuy = $this->rub()['buy'];
                if ($from == 'BTC') {
                    $usdSale = $this->usd()['sale'];
                    $uah = $from_Currency * $usdSale;

                    $to_Currency = $uah / $rubBuy;
                } else {
                    $to_Currency = $from_Currency / $rubBuy;
                }
                break;
            case "UAH":
                if ($from == 'BTC') {
                    $usdSale = $this->usd()['sale'];
                    $uah = $from_Currency * $usdSale;

                    $to_Currency = $uah;
                } else {
                    $to_Currency = $from_Currency;
                }
                break;
            case "BTC":
                $btcBuy = $this->btc()['buy'];
                $to_Currency = $from_Currency / $btcBuy;
                break;
        }
        return round($to_Currency, 3);
    }
}