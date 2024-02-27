<?php

namespace src;

class Container
{
    protected array $bindings = [];
    protected array $resolved = [];
    protected array $instances = [];

    public function singleton($abstract, $concrete = null): void
    {
        $this->bind($abstract, $concrete, true);
    }

    public function bind($abstract, $concrete = null, $shared = false)
    {
//        if (array_key_exists($abstract, $this->bindings)) {
//            if ($this->bindings[$abstract]['shared']) {
//                return;
//            }
//        }
        if (is_null($concrete)) {
            $concrete = $abstract;
        }

        $this->bindings[$abstract] = [
            'concrete' => $concrete,
            'shared' => $shared,
        ];
    }

    public function resolve($abstract, $parameters = [])
    {
        $concrete = $abstract;
        if (array_key_exists($abstract, $this->bindings)) {
//            $concrete = $abstract;
            $concrete = $this->bindings[$abstract]['concrete'];
        }



        $p = [];
        $reflection = new \ReflectionClass($concrete);
        if ($dependency = $reflection->getConstructor()) {
            $p = $this->dependency($dependency->getParameters());
        }
//        var_dump($p);
        $object = $reflection->newInstanceArgs($p);

        $this->resolved[$abstract] = true;
        $this->instances[$abstract] = $object;



        return $object;
    }

    public function dependency($dependencies)
    {
        $objects = [];
        foreach ($dependencies as $dependency) {
            if ($class = $dependency->getClass()->getname()) {
//                var_dump('dep');
//                var_dump($class);
                $obj = $this->resolve($class);
                $objects[] = $obj;
            }
        }

        return $objects;
    }

    public function make($abstract, array $parameters = [])
    {
        return $this->resolve($abstract, $parameters);
    }

    public function get($abstract = null)
    {
        if (is_null($abstract)) {
            return $this->instances;
        }
        return $this->instances[$abstract];
    }
}
