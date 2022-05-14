<?php

namespace Tools4Schools\SDK\Clients;

use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\Plugin;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\PluginClientFactory;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class ClientBuilder
{
    protected ClientInterface $client;
    protected RequestFactoryInterface $requestFactory;
    protected StreamFactoryInterface $streamFactory;

    protected array $plugins =[];

    public function __construct(
        ClientInterface $httpClient = null,
        RequestFactoryInterface $requestFactory = null,
        StreamFactoryInterface $streamFactory = null
    )   {
        $this->client = $httpClient ?: HttpClientDiscovery::find();
        $this->requestFactory = $requestFactory?: Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory?: Psr17FactoryDiscovery::findStreamFactory();
    }

    public function addPlugin(Plugin $plugin): void
    {
        $this->plugins[] = $plugin;
    }

    public function getClient(): HttpMethodsClientInterface
    {
        $pluginClient = (new PluginClientFactory())->createClient($this->client,$this->plugins);
        return new HttpMethodsClient(
            $pluginClient,
            $this->requestFactory,
            $this->streamFactory
        );
    }
}