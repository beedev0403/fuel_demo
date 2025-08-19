<?php

use Fuel\Core\Validation;

/**
 * The Post Create Validation Class.
 * Handles validation logic for creating new posts.
 * @author Vương Kỳ Binh <v_kybinh@thk-hd.vn>
 */
class Validation_Post_Create
{
    /**
     * Create and configure Validation object for new post creation form
     * @return Validation
     */
    public static function forge(): Validation
    {
        $val = Validation::forge('post_create');

        // Add fields which need to validate
        $val->add_field('title', 'Title', 'required|min_length[3]|max_length[255]');
        $val->add_field('body', 'Body', 'required');

        // Set messages for validation errors
        $val->set_message('required', 'The field :label is required.');
        $val->set_message('min_length', 'The field :label must be at least :param:1 characters long.');
        $val->set_message('max_length', 'The field :label must not exceed :param:1 characters.');

        return $val;
    }
}