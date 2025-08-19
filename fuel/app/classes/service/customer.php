<?php

class Service_Customer
{
    /**
     * @var Interface_Customer The customer repository instance
     */
    protected $customer_repository;

    /**
     * The constructor, which injects the repository dependency
     * @param  Interface_Customer  $customer_repository
     */
    public function __construct(Interface_Customer $customer_repository)
    {
        $this->customer_repository = $customer_repository;
    }
    /**
     * Get all customers for display
     * @return Model_Customer[]
     */

    //related posts
    public function get_all_customers(): array
    {
        $customers = $this->customer_repository->find_all();
        foreach ($customers as $customer) {
            $customer->with('posts');
        }
        return $customers;
    }

    /**
     * Get a customer by ID
     * @param  integer    $id
     * @return Model_Customer
     */
    public function get_customer(int $id): Model_Customer
    {
        $customer = $this->customer_repository->find_by_id($id);
        if (!$customer) {
            throw new \Exception("Customer with ID {$id} not found.");
        }
        return $customer;
    }

    /**
     * Create a new customer
     * @param  array      $data
     * @return Model_Customer
     */
    public function create_customer(array $data): Model_Customer
    {
        $customer = new Model_Customer($data);
        if (!$customer->save()) {
            throw new \Exception("Failed to create customer.");
        }
        return $customer;
    }

    /**
     * Update an existing customer
     * @param  integer    $id
     * @param  array      $data
     * @return Model_Customer
     */
    public function update_customer(int $id, array $data): Model_Customer
    {
        $customer = $this->get_customer($id);
        $customer->set($data);
        if (!$customer->save()) {
            throw new \Exception("Failed to update customer.");
        }
        return $customer;
    }

    /**
     * Delete a customer
     * @param  integer    $id
     * @return boolean
     * @throws Exception If the customer cannot be found
     */
    public function delete_customer(int $id): bool
    {
        $customer = $this->get_customer($id);
        if (!$customer) {
            throw new \Exception("Customer with ID {$id} not found.");
        }
        return $customer->delete_customer();
    }

    // Additional methods for customer service can be added here
}
