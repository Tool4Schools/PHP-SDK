<?php

namespace Tools4Schools\SDK\Clients;

use Psr\Http\Client\ClientInterface;

class ClientBuilder
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
}