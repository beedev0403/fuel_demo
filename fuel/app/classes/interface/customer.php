<?php

interface Interface_Customer
{
    /**
     * Find all customers, ordered by creation date
     * @return Model_Customer[]
     */
    public function find_all(): array;

    /**
     * Find a customer by its ID
     * @param  integer    $id
     * @return Model_Customer
     */
    public function find_by_id(int $id): Model_Customer;

    /**
     * Persist a customer to the database (handles both create and update)
     * @param  Model_Customer $customer
     * @return Model_Customer
     * @throws Exception
     */
    public function save_customer(Model_Customer $customer): Model_Customer;

    /**
     * Delete a customer from the database
     * @param  Model_Customer $customer The customer model instance to delete
     * @return Model_Customer
     * @throws Exception
     */
    public function delete_customer(Model_Customer $customer): Model_Customer;
}
?>