<?php

namespace Abyzs\PrivatCoolLib\Integration;

use PHPUnit\Framework\TestCase;
use Abyzs\PrivatCoolLib\ExchangeAmount;

class ExchangeAmountTest extends TestCase
{
    private ExchangeAmount $exchangeAmount;

    protected function setUp(): void
    {
        $this->exchangeAmount = new ExchangeAmount('UAH', 'USD', 1000);
    }

    public function testToDecimal()
    {
        $this->assertEquals($this->exchangeAmount->toDecimal(), $this->getActualExchange());
    }

    private function getActualExchange(): float
    {
        $json = file_get_contents("https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11");
        $exchanges = json_decode($json, true);

        foreach ($exchanges as $key => $value) {
            if ($value['ccy'] == 'USD') {
                return round(1000 / $value['buy'], 3);
            }
        }
    }

}