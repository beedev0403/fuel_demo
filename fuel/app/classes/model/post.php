<?php

use Orm\Model;

/**
 * The Post Model.
 * Represents a single post entry in the database.
 * @author Vương Kỳ Binh <v_kybinh@thk-hd.vn>
 */
class Model_Post extends Model
{
    /**
     * The table name
     * @var string
     */
    protected static $_table_name = 'posts';

    /**
     * @var array The model's properties
     */
    protected static $_properties = array(
        'id',
        'title',
        'body',
        'created_at',
        'updated_at',
    );

    /**
     * Defines observers for this model to automatically handle timestamps
     * @var array
     */
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false, // Use Unix Timestamp (integer)
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => false, // Use Unix Timestamp (integer)
        ),
    );

    /**
     * Get created_at column after formatted
     * @param string $format
     * @return string
     */
    public function get_created_at_formatted(string $format = 'local_full'): string
    {
        return Date::forge($this->created_at)->format($format);
    }

    /**
     * Get updated_at column after formatted
     * @param string $format
     * @return string
     */
    public function get_updated_at_formatted(string $format = 'local_full'): string
    {
        return Date::forge($this->updated_at)->format($format);
    }
}
