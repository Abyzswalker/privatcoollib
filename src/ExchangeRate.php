<?php

namespace Abyzs\PrivatCoolLib;

use Abyzs\PrivatCoolLib\Api\PrivatApi;
use Exception;

class ExchangeRate
{
    private string $from;
    private string $to;
    private float $amount;
    private array $exchangeRates;

    public function __construct(string $from, string $to, float $amount, PrivatApi $privatApi)
    {
        $this->from = $from;
        $this->to = $to;
        $this->amount = $amount;
        $this->exchangeRates = $privatApi->getData();
    }

    public function get(): float
    {
        foreach ($this->exchangeRates as $value) {
            if (in_array($this->from, $value) && in_array($this->to, $value)) {
                if ($value['ccy'] == $this->from) {
                    $result = round($value['sale'] * $this->amount, 3);
                } else {
                    $result = round($this->amount / $value['buy'], 3);
                }
            }
        }

        if (!$result) {
            throw new Exception('Currency error');
        }

        return $result;
    }
}