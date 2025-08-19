<?php

use Fuel\Core\DB;

/**
 * The Customer Repository.
 * Implements the ICustomer interface and handles all data access logic for Customers.
 */
class Repository_Customer implements Interface_Customer
{
    /**
     * Find all customers, ordered by creation date
     * @return Model_Customer[]
     */
    public function find_all(): array
    {
        $customers = Model_Customer::find('all', [
            'order_by' => ['created_at' => 'desc'],
        ]);
        return $customers === null ? [] : $customers;
    }

    /**
     * Find a customer by its ID
     * @param  integer    $id
     * @return Model_Customer
     */
    public function find_by_id(int $id): Model_Customer
    {
        return Model_Customer::find($id);
    }

    /**
     * Persist a customer to the database (handles both create and update)
     * @param  Model_Customer $customer
     * @return Model_Customer
     * @throws Exception
     */
    public function save_customer(Model_Customer $customer): Model_Customer
    {
        try {
            DB::start_transaction();
            if ($customer->save()) {
                DB::commit_transaction();
                return $customer;
            }
            throw new Exception('Failed to save customer');
        } catch (Exception $e) {
            DB::rollback_transaction();
            \Fuel\Core\Log::error($e->getMessage());
            throw $e;
        }
    }

    /**
     * Delete a customer from the database
     * @param  Model_Customer $customer The customer model instance to delete
     * @return Model_Customer
     * @throws Exception
     */
    public function delete_customer(Model_Customer $customer): Model_Customer
    {
        try {
            DB::start_transaction();
            if ($customer->delete()) {
                DB::commit_transaction();
                return $customer;
            }
            throw new Exception('Failed to delete customer');
        } catch (Exception $e) {
            DB::rollback_transaction();
            \Fuel\Core\Log::error($e->getMessage());
            throw $e;
        }
    }
}
