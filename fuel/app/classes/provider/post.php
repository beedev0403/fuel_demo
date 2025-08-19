<?php

class Provider_Post
{
    /**
     * Register the post module bindings.
     * @return  void
     */
    public static function register()
    {
        // Bind the Interface_Post to its concrete implementation.
        // This includes the caching decorator logic.
        Container::bind(Interface_Post::class, function () {
            $post_repository = new Repository_Post();
            return $post_repository;
        });

        // Bind the Service_Post as a singleton.
        // It resolves its repository dependency from the container.
        Container::singleton(Service_Post::class, function () {
            $post_repository = Container::forge(Interface_Post::class);
            return new Service_Post($post_repository);
        });
    }
}