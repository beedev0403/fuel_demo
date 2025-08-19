<?php

/**
 * A simple dependency injection container to manage class dependencies.
 * @author Vương Kỳ Binh <v_kybinh@thk-hd.vn>
 */
class Provider_Base
{
    /**
     * Array containing all Service Providers of the application.
     * When there is a new module, you just need to add its provider here.
     * @var array
     */
    protected static $providers = [
        Provider_Post::class,
        Provider_Customer::class,
    ];

    /**
     * Register all providers.
     */
    public static function register()
    {
        foreach (static::$providers as $provider) {
            $provider::register();
        }
    }
}
