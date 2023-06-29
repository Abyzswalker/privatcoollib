<?php

namespace Abyzs\PrivatCoolLib\Unit\Api;

use PHPUnit\Framework\TestCase;
use Abyzs\PrivatCoolLib\Api\PrivatUrl;

class PrivatUrlTest extends TestCase
{
    protected function setUp(): void {}

    public function testUrl()
    {
        $privatUrl = new PrivatUrl();

        $this->assertIsString($privatUrl->get());
    }
}