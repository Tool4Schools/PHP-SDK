<?php

namespace Tools4Schools\SDK\Endpoints;

use Psr\Http\Message\ResponseInterface;
use Tools4Schools\SDK\Sdk;

abstract class  BaseEndpoint
{
    protected Sdk $sdk;

    protected string $resource;

    public function __construct(Sdk $sdk)
    {
        $this->sdk = $sdk;
    }

    public function all(): array
    {
        return $this->parseResponse($this->sdk->getClient()->get($this->resource));
    }

    public function find($id)
    {
        return $this->parseResponse($this->sdk->getClient()->get($this->resource."/".$id));
    }

    protected function parseResponse(ResponseInterface $response):array
    {
        return json_decode($response->getBody()->getContents(),true);
    }
}