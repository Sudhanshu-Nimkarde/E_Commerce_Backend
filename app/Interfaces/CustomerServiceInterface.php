<?php

namespace App\Interfaces;

interface CustomerServiceInterface
{

    public function getCurrentCustomer(int $customerId);
    public function editCustomerProfile(int $customerId, array $data);
}