<?php

namespace Abyzs\PrivatCoolLib;


class ExchangeAmount
{
    private $url = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';
    private $from;
    private $to;
    private $amount;

    public function __construct($from, $to, $amount)
    {
        $this->from = $from;
        $this->to = $to;
        $this->amount = $amount;
    }

    private function curl()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_URL => $this->url,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
            )
        );

        return json_decode(curl_exec($curl), true);
    }

    private function exchangeRates()
    {
        $exchanges = $this->curl();

        foreach ($exchanges as $key => $value) {
            if (in_array($this->from, $value) && in_array($this->to, $value)) {
                $exchange = $value;
            }
        }
        return $exchange;
    }

    public function toDecimal()
    {
        $exchange = $this->exchangeRates();
        if ($exchange) {
            if ($this->from == $this->to) {
                $result = $this->amount;
            } elseif ($exchange['ccy'] == $this->from) {
                $result = $exchange['sale'] * $this->amount;
            } else {
                $result = $this->amount / $exchange['buy'];
            }
        }
        return round($result, 3);
    }
}