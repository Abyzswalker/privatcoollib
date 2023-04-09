<?php

namespace Abyzs\PrivatCoolLib\Unit;

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
        $this->assertIsArray($this->exchangeRate->get());
    }
}