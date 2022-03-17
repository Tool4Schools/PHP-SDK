<?php

namespace Tools4Schools\SDK\Clients;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface HttpClientInterface
{



    public function post(RequestInterface $request):ResponseInterface ;


    public function put(RequestInterface $request):ResponseInterface ;


    public function delete(RequestInterface $request):ResponseInterface ;
}