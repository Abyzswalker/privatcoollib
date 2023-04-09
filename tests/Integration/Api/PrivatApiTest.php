<?php

namespace Abyzs\PrivatCoolLib\Integration\Api;

use PHPUnit\Framework\TestCase;
use Abyzs\PrivatCoolLib\Api\PrivatApi;

class PrivatApiTest extends TestCase
{
    private PrivatApi $api;

    protected function setUp(): void
    {
        $this->api = new PrivatApi();
    }

    public function testUrl()
    {
        $json = file_get_contents("https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11");
        $exchanges = json_decode($json, true);

        $this->assertEquals($this->api->getData(), $exchanges);
    }
}