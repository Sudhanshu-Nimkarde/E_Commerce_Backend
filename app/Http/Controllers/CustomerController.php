<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCustomerProfileRequest;
use App\Interfaces\CustomerServiceInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected CustomerServiceInterface $customerService;

    public function __construct(
        CustomerServiceInterface $customerService
    ) {
        $this->customerService = $customerService;
    }

    public function getCurrentCustomerDetails(Request $request) 
    {
        $customerId = $request->header('user-id');

        if (!$customerId) 
        {
            return response()->json([
                'status' => false,
                'status_code' => 'EC_0000',
                'message' => 'Unauthorized'
            ], 401);
        }

        $response = $this->customerService->getCurrentCustomer($customerId);

        return response()->json(
            $response,
            $response['status'] ? 200 : 500
        );

    }



    public function editProfile(EditCustomerProfileRequest $request)
    {
        $customerId = $request->header('user-id');

        $response = $this->customerService->editCustomerProfile(
                $customerId,
                $request->validated()
            );

        return response()->json(
            $response,
            $response['status'] ? 200 : 500
        );
    }
}