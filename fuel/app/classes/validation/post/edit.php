<?php

use Fuel\Core\Validation;

/**
 * The Post Edit Validation Class.
 * Handles validation logic for editing existing posts.
 * @author Vương Kỳ Binh <v_kybinh@thk-hd.vn>
 */
class Validation_Post_Edit
{
    /**
     * Create and configure Validation object for new post creation form
     * @return Validation
     */
    public static function forge(): Validation
    {
        $val = Validation::forge('post_edit');

        // Add fields which need to validate
        $val->add_field('title', 'Title', 'required|min_length[3]|max_length[255]');
        $val->add_field('body', 'Body', 'required');

        // Set messages for validation errors
        $val->set_message('required', 'Trường :label là bắt buộc.');
        $val->set_message('min_length', 'Trường :label phải có ít nhất :param:1 ký tự.');
        $val->set_message('max_length', 'Trường :label không được vượt quá :param:1 ký tự.');

        return $val;
    }
}
