<?php

namespace Abyzs\PrivatCoolLib\Unit\Api;

use PHPUnit\Framework\TestCase;
use Abyzs\PrivatCoolLib\Api\PrivatApi;

class PrivatApiTest extends TestCase
{
    protected function setUp(): void {}

    public function testUrl()
    {
        $privatApi = new PrivatApi();

        $this->assertIsArray($privatApi->getData());
    }
}