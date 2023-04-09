<?php

namespace Abyzs\PrivatCoolLib;

use Abyzs\PrivatCoolLib\Api\PrivatApi;

class ExchangeRate
{
    private string $from;
    private string $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function get(): array
    {
        $exchanges = (new PrivatApi())->getData();
        $exchange = [];

        if (!empty($exchanges)) {
            foreach ($exchanges as $value) {
                if (in_array($this->from, $value) && in_array($this->to, $value)) {
                    $exchange = $value;
                }
            }
        }

        return $exchange;
    }
}