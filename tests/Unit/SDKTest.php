<?php

namespace Tools4Schools\Tests\SDK\Unit;

use GuzzleHttp\Psr7\Response;
use Tools4Schools\Tests\SDK\TestCase;

class SDKTest extends TestCase
{
    /** @test */
    public function canRequestAndReceive200Response()
    {
        $client= $this->getSDK()->getClient();
        $response = $client->get('/me');

        $this->assertEquals(200,$response->getStatusCode());
    }

    /** @test */
    public function canRequestAndReceive201Response()
    {
        $this->mockClient->addResponse((new Response())->withStatus(201));

        $client= $this->getSDK()->getClient();
        $response = $client->post('/me');

        $this->assertEquals(201,$response->getStatusCode());
    }
}