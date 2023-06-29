<?php

namespace Abyzs\PrivatCoolLib\Integration;

use PHPUnit\Framework\TestCase;
use Abyzs\PrivatCoolLib\ExchangeRate;
use Abyzs\PrivatCoolLib\Api\PrivatApi;

class ExchangeRateTest extends TestCase
{
    protected function setUp(): void {}

    public function testGet()
    {
        $privatApi = new PrivatApi();
        $exchangeRate = new ExchangeRate('UAH', 'USD', 100, $privatApi);

        $this->assertIsFloat($exchangeRate->get());
    }
}