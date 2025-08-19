<?php

use Fuel\Core\Controller_Template;

class Controller_Customer extends Controller_Template
{
    /**
     * @var Service_Customer The customer service instance
     */
    protected $customer_service;

    public function before()
    {
        parent::before();
        $this->customer_service = Container::forge(Service_Customer::class);
    }
    public function action_index()
    {
        $customers = $this->customer_service->get_all_customers();
        $this->template->title = 'Customers';
        $this->template->content = View::forge('customer/index', $customers);
    }

    public function action_create()
    {
        $this->template->title = 'Create Customer';
        $this->template->content = View::forge('customer/create');
    }

    public function action_edit($id)
    {
        $this->template->title = 'Edit Customer';
        $this->template->content = View::forge('customer/edit');
    }

    public function action_delete($id)
    {
        // Logic to delete a customer
    }
}
