<?php

namespace Abyzs\PrivatCoolLib\Api;

class PrivatUrl
{
    public function get(): string
    {
        return 'https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11';
    }
}