<?php

declare(strict_types=1);

namespace Tools4Schools\Tests\SDK;


use Http\Mock\Client;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Tools4Schools\SDK\Clients\ClientBuilder;
use Tools4Schools\SDK\Options;
use Tools4Schools\SDK\Sdk;
use Tools4Schools\SDK\Tools4Schools;

abstract class TestCase extends PHPUnitTestCase
{
   protected Client $mockClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockClient = new Client();
    }
    
   /* protected function getSDK():Tools4Schools
    {
        $options = ['client' => $this->mockClient];
        return new Tools4Schools($options);
    }*/

    protected function getSdk():Sdk
    {
        return new Sdk(new Options([
            'client_builder' => new ClientBuilder($this->mockClient),
        ]));
    }
}