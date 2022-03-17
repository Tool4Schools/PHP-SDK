<?php

namespace Tools4Schools\SDK\Resources;

use Illuminate\Support\Str;
use Psr\Http\Client\ClientInterface;
use Tools4Schools\SDK\Request\Builder;
use Tools4Schools\SDK\Resources\Concerns\HasAttributes;

abstract class ResourceModel
{
    use HasAttributes;

    /**
     * The endpoint associated with the model
     *
     * @var string
     */
    protected $endpoint;

    /**
     * The http Client instance
     *
     * @var ClientInterface
     */
    protected static $client;

    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }


    public static function setClient(ClientInterface $client)
    {
        static::$client = $client;
    }



    /**
     * Get a new request builder for the models table
     *
     * @return Builder
     */
    public function newRequest():Builder
    {
        return (new Builder(static::$client))->setModel($this);
    }

    public function getEndpoint():string
    {
        return $this->endpoint ?? Str::snake(Str::pluralStudly(class_basename($this)));
    }

    public function setEndpoint($endpoint):self
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    public function fill(array $attributes){
        foreach ($attributes as $key => $value){
            $this->setAttribute($key,$value);
        }

        return $this;
    }

    public function save()
    {
        if($this->exist){
            //$saved = $this->preformUpdate()
        }else{
            //$saved = $this->preformInsert()
        }
    }

    protected function preformInsert()
    {
       $request = new Request('GET',$this->resource());

       $this->client()->sendRequest($request);

    }

    public function newInstance($attributes = []):ResourceModel
    {
        $model = new static;

        // $model->exists = $exists;

        /* $model->setConnection(
             $this->getEndpoint()
         );*/

        $model->setEndpoint($this->getEndpoint());

        $model->fill((array) $attributes);

        return $model;
    }



    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    /**
     * Dynamically set attributes on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }

    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->newRequest()->$method(...$parameters);
    }

    /**
     * Handle dynamic static method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public static function __callStatic(string $method, array $parameters)
    {
        return (new static)->$method(...$parameters);
    }
}