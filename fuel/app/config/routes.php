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

return array(
	/**
	 * -------------------------------------------------------------------------
	 *  Default route
	 * -------------------------------------------------------------------------
	 *
	 */

	'_root_' => 'welcome/index',

	/**
	 * -------------------------------------------------------------------------
	 *  Page not found
	 * -------------------------------------------------------------------------
	 *
	 */

	'_404_' => 'welcome/404',

	/**
	 * -------------------------------------------------------------------------
	 *  Example for Presenter
	 * -------------------------------------------------------------------------
	 *
	 *  A route for showing page using Presenter
	 *
	 */

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

	// 1. Hiển thị danh sách tất cả bài viết (GET)
	// URI: /posts
	'posts' => 'post/index',

	// 2. Hiển thị form và xử lý tạo bài viết mới
	// Tương ứng với: action_create()
	// URI: /posts/create (method: GET để hiển thị, POST để xử lý)
	'posts/create' => 'post/create',

	// 3. Hiển thị form và xử lý chỉnh sửa bài viết
	// Tương ứng với: action_edit($id)
	// URI: /posts/edit/123 (method: GET để hiển thị, POST để xử lý)
	'posts/edit/(:any)' => 'post/edit/$1',

	// 4. Xử lý xóa một bài viết
	// Tương ứng với: action_delete($id)
	// URI: /posts/delete/123
	'posts/delete/(:any)' => 'post/delete/$1',

	// Routes for customer module
	'customers' => 'customer/index',
	'customers/create' => 'customer/create',
	'customers/edit/(:any)' => 'customer/edit/$1',
	'customers/delete/(:any)' => 'customer/delete/$1',
);
