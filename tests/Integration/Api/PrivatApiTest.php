<?php

namespace Abyzs\PrivatCoolLib\Integration\Api;

use PHPUnit\Framework\TestCase;
use Abyzs\PrivatCoolLib\Api\PrivatApi;

class PrivatApiTest extends TestCase
{
    protected function setUp(): void {}

    public function testUrl()
    {
        $privatApi = new PrivatApi();

        $json = file_get_contents("https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11");
        $exchanges = json_decode($json, true);

        $this->assertEquals($privatApi->getData(), $exchanges);
    }
}