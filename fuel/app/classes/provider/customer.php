<?php
class Provider_Customer
{
    public static function register()
    {
        // Bind the Interface_Customer to its concrete implementation.
        Container::bind(Interface_Customer::class, function () {
            $customer_repository = new Repository_Customer();
            return $customer_repository;
        });

        // Bind the Service_Customer as a singleton.
        Container::singleton(Service_Customer::class, function () {
            $customer_repository = Container::forge(Interface_Customer::class);
            return new Service_Customer($customer_repository);
        });
    }
}
