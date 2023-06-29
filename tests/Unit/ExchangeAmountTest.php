<?php

namespace Abyzs\PrivatCoolLib\Unit;

use PHPUnit\Framework\TestCase;
use Abyzs\PrivatCoolLib\ExchangeAmount;

class ExchangeAmountTest extends TestCase
{
    protected function setUp(): void {}

    public function testToDecimal()
    {
        $exchangeAmount = new ExchangeAmount('USD', 'UAH', 100);

        $this->assertIsFloat($exchangeAmount->toDecimal());
    }
}