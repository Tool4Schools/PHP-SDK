<?php

namespace Tools4Schools\SDK;

use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tools4Schools\SDK\Clients\ClientBuilder;
use Tools4Schools\SDK\Clients\Guzzle;

class Options
{
    protected $options;

    /**
     * Default API version for requests.
     *
     * @const string
     */
    const DEFAULT_API_VERSION = 'v0.1';

    /**
     * The url to the production server
     *
     * @const string
     */
    const BASE_API_URL = 'https://api.tools4schools.ie';

    /**
     * The url to the staging server
     *
     * @const string
     */
    const BASE_API_URL_BETA = 'https://staging.api.tools4schools.ie';

    public function __construct(array $options = [])
    {
        $resolver = new OptionsResolver();
        $this->ConfigureOptions($resolver);
        $this->options = $resolver->resolve($options);
    }

    /**
     * Configure the default options
     *
     * @param OptionsResolver $resolver
     */
    protected function ConfigureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'client' => new Guzzle(),
            'default_graph_version' => static::DEFAULT_API_VERSION,
            'enable_beta_mode' => false,
            'base_url' => static::BASE_API_URL,
            'client_builder' => new ClientBuilder(),
            'uri_factory' => Psr17FactoryDiscovery::findUriFactory(),
        ]);

        $resolver->setAllowedTypes('base_url', 'string');
        $resolver->setAllowedTypes('client_builder', ClientBuilder::class);
        $resolver->setAllowedTypes('uri_factory', UriFactoryInterface::class);
    }

   /* protected function getURL()
    {
        return $this->options['enable_beta_mode'] ? static::BASE_API_URL_BETA : $this->options['base_url'];
    }

    public function getClient()
    {
        return $this->options['client'];
    }*/

    public function getClientBuilder(): ClientBuilder
    {

        return $this->options['client_builder'];
    }

    public function getUriFactory(): UriFactoryInterface
    {

        return $this->options['uri_factory'];
    }

    public function getUri(): UriInterface
    {
        return $this->getUriFactory()->createUri($this->options['base_url']);
    }
}