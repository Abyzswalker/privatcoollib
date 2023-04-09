<?php

namespace Abyzs\PrivatCoolLib\Integration\Api;

use PHPUnit\Framework\TestCase;
use Abyzs\PrivatCoolLib\Api\PrivatUrl;

class PrivatUrlTest extends TestCase
{
    private PrivatUrl $url;

    protected function setUp(): void
    {
        $this->url = new PrivatUrl();
    }

    protected function tearDown(): void {}

    public function testUrl()
    {
        $this->assertEquals($this->url->get(), 'https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11');
    }
}