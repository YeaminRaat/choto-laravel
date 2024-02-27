<?php

namespace src\Facade;

use src\Facade;

/**
 * @method static \src\Router get(string $uri, callable $action)
 *
 */
class Route extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'router';
    }
}