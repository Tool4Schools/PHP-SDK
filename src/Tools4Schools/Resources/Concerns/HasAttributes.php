<?php

namespace Tools4Schools\SDK\Resources\Concerns;

trait HasAttributes
{
    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        if (!$key) {
            return;
        }

        if(array_key_exists($key, $this->attributes))
        {
            //return $this->getAttributeValue($key);
            return $this->getAttributeFromArray($key);
        }

        /*if (method_exists(self::class, $key)) {
            return;
        }*/
    }

    /**
     * Get an attribute from the $attributes array.
     *
     * @param  string  $key
     * @return mixed
     */
    protected function getAttributeFromArray($key)
    {
        return $this->attributes[$key] ?? null;
    }


    public function setAttribute($key,$value)
    {
        $this->attributes[$key] = $value;

        return $this;
    }
}