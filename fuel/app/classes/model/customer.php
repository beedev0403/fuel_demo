<?php

use Fuel\Core\Validation;
use Orm\Model;

class Model_Customer extends Model
{
    protected static $_table_name = 'customers';

    protected static $_properties = array(
        'id',
        'name',
        'email',
        'phone',
        'created_at',
        'updated_at',
    );

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'mysql_timestamp' => false,
        ),
    );

    protected static $_has_many = array(
        'posts' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Post',
            'key_to' => 'customer_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
    );

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('name', 'Name', 'required|max_length[255]');
        $val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
        $val->add_field('phone', 'Phone', 'required|max_length[255]');

        return $val;
    }
}
