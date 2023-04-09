<?php

namespace Abyzs\PrivatCoolLib\Integration;

use PHPUnit\Framework\TestCase;
use Abyzs\PrivatCoolLib\ExchangeRate;

class ExchangeRateTest extends TestCase
{
    private ExchangeRate $exchangeRate;

    protected function setUp(): void
    {
        $this->exchangeRate = new ExchangeRate('UAH', 'USD');
    }

    public function testGet()
    {
        $this->assertNotEmpty($this->exchangeRate->get());
    }
}