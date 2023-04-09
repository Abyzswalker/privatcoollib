<?php

namespace Abyzs\PrivatCoolLib\Unit\Api;

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
        $this->assertIsString($this->url->get());
    }
}