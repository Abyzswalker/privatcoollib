<?php

namespace Abyzs\PrivatCoolLib;

use Abyzs\PrivatCoolLib\Api\PrivatApi;
use Throwable;

class ExchangeAmount
{
    private string $from;
    private string $to;
    private float $amount;

    public function __construct(string $from,  string $to, float $amount)
    {
        $this->from = $from;
        $this->to = $to;
        $this->amount = $amount;
    }

    public function toDecimal(): float
    {
        try {
            if ($this->from == $this->to) {
                return $this->amount;
            } else {
                return (new ExchangeRate($this->from, $this->to, $this->amount, new PrivatApi()))->get();
            }
        } catch (Throwable $ex) {
            echo $ex->getMessage();
        }
    }
}