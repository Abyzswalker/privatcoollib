<?php

namespace Abyzs\PrivatCoolLib\Unit;

use PHPUnit\Framework\TestCase;
use Abyzs\PrivatCoolLib\ExchangeRate;
use Abyzs\PrivatCoolLib\Api\PrivatApi;

class ExchangeRateTest extends TestCase
{
    protected function setUp(): void {}

    public function testGet()
    {
        $privatApiMock = $this->createMock(PrivatApi::class);
        $privatApiMock->method('getData')
            ->willReturn([
                [
                    "ccy" => "USD",
                    "base_ccy" => "UAH",
                    "buy" => "36.56860",
                    "sale" => "37.45318"
                ],
                [
                    "ccy" => "EUR",
                    "base_ccy" => "UAH",
                    "buy" => "40.1",
                    "sale" => "41.1"
                ]
            ]);


        $privatApiMock->expects($this->once())
            ->method('getData');


        $exchangeRate = new ExchangeRate('USD', 'UAH', 100, $privatApiMock);
        $result = round(37.45318 * 100, 3);

        $this->assertEquals($result, $exchangeRate->get());
    }
}