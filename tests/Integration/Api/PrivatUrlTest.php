<?php

namespace Abyzs\PrivatCoolLib\Integration\Api;

use PHPUnit\Framework\TestCase;
use Abyzs\PrivatCoolLib\Api\PrivatUrl;

class PrivatUrlTest extends TestCase
{
    protected function setUp(): void {}

    public function testUrl()
    {
        $url = new PrivatUrl();

        $this->assertEquals($url->get(), 'https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11');
    }
}