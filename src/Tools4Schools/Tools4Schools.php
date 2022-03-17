<?php
/**
 * Created by PhpStorm.
 * User: Timothy
 * Date: 29/06/2018
 * Time: 18:48
 */

namespace Tools4Schools\SDK;


use GuzzleHttp\Client;
use Tools4Schools\SDK\Graph\Model;
use Tools4Schools\SDK\Oauth2\AuthTokenMiddleware;
use Tools4Schools\SDK\Oauth2\Client as Oauth2Client;
use Tools4Schools\SDK\Resources\ResourceModel;

class Tools4Schools
{
    /**
     * Version number of the Tools4Schools PHP SDK.
     *
     * @const string
     */
    const VERSION = '0.0.3';



    /**
     * Toggle to use staging api url.
     *
     * @var bool
     */
    protected $enableBetaMode = false;

    /**
     * The main guzzle connection
     *
     * @var \GuzzleConnection the api client
     */
    protected $connection;

    /**
     * The oauth2 client to handle authentication requests
     *
     * @var Oauth2\Client the Oauth2 Client
     */
    protected $oauth2Client;

    /**
     * List of configure values
     *
     * @var array
     */
    protected $config = [];

    /**
     * A tenants uuid
     *
     * @var string
     */
    protected $tenant;

    public function __construct(array $options = [])
    {
        $this->options = new Options($options);
/*
        $this->config = array_merge([
            'default_graph_version' => static::DEFAULT_API_VERSION,
            'enable_beta_mode' => false,
        ], $config);

        $this->config['base_uri'] = $this->getBaseApiUrl();

        $this->connection = new GuzzleConnection($this->config);

        $this->oauth2Client = new Oauth2Client($this->config);

        $this->connection->addMiddleware(new AuthTokenMiddleware($this->oauth2Client));


        //Model::setConnection($this->connection);
*/
        ResourceModel::setClient($this->client());
    }




    /**
     * Returns the base api URL.
     *
     * @return string
     */
    public function getBaseApiUrl()
    {
        return $this->config['enable_beta_mode'] ? static::BASE_API_URL_BETA : static::BASE_API_URL;
    }

    public function setAccessToken($access_token){
        $this->config['access_token'] = $access_token;
    }

   /* public function user()
    {
        return User($this->connection->get('me')['data']);
    }*/

    public function client()
    {
        return $this->options->getClient();
    }
}