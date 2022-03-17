<?php

namespace Tools4Schools\SDK\Request;

use Psr\Http\Client\ClientInterface;
use Tools4Schools\SDK\Resources\ResourceModel;

class Builder
{
    /**
     * The base HttpClient
     *
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var
     */
    protected ResourceModel $model;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function setModel(ResourceModel $model)
    {
        $this->model = $model;

        //$this->client->withUri($model->getEndpoint(), $preserveHost = false);
        //sendRequest

        return $this;
    }

    public function create(array $attributes =[])
    {
        return ($this->model->newInstance($attributes))->save();
    }
}