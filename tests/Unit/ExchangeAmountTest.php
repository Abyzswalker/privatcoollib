<?php

namespace Abyzs\PrivatCoolLib\Unit;

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
        $this->assertIsFloat($this->exchangeAmount->toDecimal());
    }
}