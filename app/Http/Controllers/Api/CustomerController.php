<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    protected $customer;

    public function __construct()
    {
        $this->customer = new CustomerService();
    }
    /**
     * Display a listing of the resource.
     */

    public function getDatatable(Request $request)
    {
        try {
            $customers = $this->customer->getDatatable($request->all());
            // return new CustomerResource(true, 'Success', $customers);
            return $customers;
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                // 'email' => ['required', 'string', 'email', 'max:255',],
                'phone_number' => ['required', 'string', 'max:255'],
                'whatsApp' => ['required', 'string', 'max:255'],
                'province' => ['required', 'string', 'max:255'],
                'city' => ['required', 'string', 'max:255'],
                'district' => ['required', 'string', 'max:255'],
                'urban_village' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
            ]);

            $data = [
                'name' => $request->name,
                'email' => $request->email ?? null,
                'phone_number' => $request->phone_number,
                'whatsApp' => $request->whatsApp,
                'province' => $request->province,
                'city' => $request->city,
                'district' => $request->district,
                'urban_village' => $request->urban_village,
                'address' => $request->address,
                'additional_address' => $request->additional_address ?? null,
            ];
            $customer = $this->customer->createCustomer($data);
            
            return response(new CustomerResource(true, 'Success', $customer), 200);
        } catch (\Exception $err) {
            return response(new CustomerResource(false, $err, []), 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
