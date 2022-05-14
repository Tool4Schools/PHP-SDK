<?php
/**
 * Created by PhpStorm.
 * User: Timothy
 * Date: 29/06/2018
 * Time: 18:48
 */

namespace Tools4Schools\SDK;


use GuzzleHttp\Client;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Message\UriFactory;
use Tools4Schools\SDK\Clients\ClientBuilder;
use Tools4Schools\SDK\Endpoints\User;
use Tools4Schools\SDK\Graph\Model;
use Tools4Schools\SDK\Oauth2\AuthTokenMiddleware;
use Tools4Schools\SDK\Oauth2\Client as Oauth2Client;
use Tools4Schools\SDK\Resources\ResourceModel;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class Sdk
{
    protected ClientBuilder $clientBuilder;

    public function __construct(Options $options = null)
    {
        $options = $options ?? new Options();

        $this->clientBuilder = $options->getClientBuilder();
        $this->clientBuilder->addPlugin(new BaseUriPlugin($options->getUri()));
        $this->clientBuilder->addPlugin(
            new HeaderDefaultsPlugin(
                [
                    'User-Agent' => 'Tools4Schools PHP SDK V0.1',
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]
            )
        );
    }

    public function getClient(): HttpMethodsClientInterface
    {
        return  $this->clientBuilder->getClient();
    }


    public function user(): User
    {
        return new User($this);
    }

}