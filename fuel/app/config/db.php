<?php

/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * -----------------------------------------------------------------------------
 *  Global database settings
 * -----------------------------------------------------------------------------
 *
 *  Set database configurations here to override environment specific
 *  configurations
 *
 */

/**
 * Cấu hình mặc định, sử dụng MySQL với driver mysqli.
 */
return array(
    'default' => array(
        'type'       => 'MySQLi',
        'connection' => array(
            'hostname'   => '127.0.0.1',
            'port'       => 3306,
            'database'   => 'fuelphp',
            'username'   => 'root',
            'password'   => false,
            'persistent' => false,
        ),
        'table_prefix' => '',
        'charset'      => 'utf8',
        'caching'      => false,
        'profiling'    => true,
    ),

);
