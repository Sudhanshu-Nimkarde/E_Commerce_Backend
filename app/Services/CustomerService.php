<?php

namespace App\Services;
use App\Interfaces\CustomerServiceInterface;
use App\Models\User;

class CustomerService implements CustomerServiceInterface 
{
    public function editCustomerProfile(int $customerId, array $data) 
    {
        $user = User::where('id', $customerId)->where('is_active', 1)->first();

        if (!$user) 
        {
            return [
                'status' => false,
                'status_code' => 'EC_0006',
                'message' => 'Customer not found'
            ];
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->contact = $data['contact'];
        $user->gender = $data['gender'];
        $user->address = $data['address'];

        if ($user->save()) {

            return [
                'status' => true,
                'status_code' => 'EC_0007',
                'message' => 'Customer profile updated successfully',
                'data' => $data
            ];
        }

        return [
            'status' => false,
            'status_code' => 'EC_0008',
            'message' => 'Failed to update customer profile'
        ];
        
    }

    public function getCurrentCustomer(int $customerId)
    {
        $getCustomer =  User::where('id', $customerId)->where('is_active', 1)->first();

        if (!$customerId) 
        {
            return [
                'status' => false,
                'status_code' => 'EC_0006',
                'message' => 'Customer not found'
            ];
        }

        return [
            'status' => true,
            'status_code' => 'EC_0009',
            'message' => 'Customer details fetched successfully',
            'data' => $getCustomer
        ];
    }
}

