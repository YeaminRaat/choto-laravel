<?php

namespace src;

abstract class Facade
{
    public static $CONTAINER;

    public static function __callStatic($method, $args)
    {
        $abstract = static::getFacadeAccessor();

        if (!array_key_exists($abstract, static::$CONTAINER->get())) {
            static::$CONTAINER->make($abstract);
        }

        $instance = static::$CONTAINER->get($abstract);
        return $instance->$method(...$args);

    }
    
}