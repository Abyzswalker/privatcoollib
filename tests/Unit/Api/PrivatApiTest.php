<?php

namespace Abyzs\PrivatCoolLib\Unit\Api;

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
        $this->assertIsArray($this->api->getData());
    }
}