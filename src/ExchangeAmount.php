<?php

namespace Abyzs\PrivatCoolLib;

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
        $exchange = (new ExchangeRate($this->from, $this->to))->get();
        $result = 0;

        if (!empty($exchange)) {
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