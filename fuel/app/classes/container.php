<?php

/**
 * @author v_kybinh
 * A simple dependency injection container to manage class dependencies.
 */
class Container
{
    /**
     * @var  array  $registry  The container's bindings.
     */
    protected static $registry = [];

    /**
     * @var  array  $instances  The container's shared instances.
     */
    protected static $instances = [];


    /**
     * Register a binding with the container.
     * @param   string    $name      The name of the binding (usually an interface).
     * @param   callable  $resolver  The closure that resolves the binding.
     * @return  void
     */
    public static function bind(string $name, callable $resolver)
    {
        static::$registry[$name] = $resolver;
    }

    /**
     * Register a shared binding in the container (singleton).
     * @param   string    $name      The name of the binding.
     * @param   callable  $resolver  The closure that resolves the binding.
     * @return  void
     */
    public static function singleton(string $name, callable $resolver)
    {
        static::$registry[$name] = function () use ($name, $resolver)
        {
            if (!isset(static::$instances[$name]))
            {
                static::$instances[$name] = $resolver();
            }
            return static::$instances[$name];
        };
    }

    /**
     * Resolve a given type from the container.
     * @param   string  $name  The name of the binding to resolve.
     * @return  mixed
     * @throws  Exception
     */
    public static function forge(string $name)
    {
        if (!isset(static::$registry[$name]))
        {
            throw new Exception("No binding found for '{$name}' in the container.");
        }
        $resolver = static::$registry[$name];
        return $resolver();
    }
}