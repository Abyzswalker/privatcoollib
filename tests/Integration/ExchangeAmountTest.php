<?php

namespace Abyzs\PrivatCoolLib\Integration;

use PHPUnit\Framework\TestCase;
use Abyzs\PrivatCoolLib\ExchangeAmount;

class ExchangeAmountTest extends TestCase
{
    protected function setUp(): void {}

    public function testToDecimal()
    {
        $exchangeAmount = new ExchangeAmount('UAH', 'USD', 1000);

        $this->assertIsFloat($exchangeAmount->toDecimal());
    }
}