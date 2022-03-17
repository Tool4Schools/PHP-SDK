<?php

namespace Tools4Schools\Tests\SDK\Unit;

use Tools4Schools\Tests\SDK\TestCase;

class SDKTest extends TestCase
{
    /** @test */
    public function canRequestAndReceive200Response()
    {
        $client= $this->getSDK()->client();
        $response = $client->get('/me');

        $this->assertEquals(200,$response->getStatusCode());
    }
}