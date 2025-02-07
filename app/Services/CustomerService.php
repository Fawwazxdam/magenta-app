<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CustomerService
{
    public function getCustomers(array $params = [])
    {
        // dd(Customer::all());
        return Customer::all();
    }

    public function getDatatable(array $params = [])
    {
        return DataTables::of($this->getCustomers($params))->make(true);
    }

    public function getCustomer(string $ID)
    {
        return Customer::find($ID);
    }

    public function getCustomerByUuid(string $uuid)
    {
        return Customer::where('uuid', $uuid)->first();
    }

    public function createCustomer(array $data)
    {
        return Customer::create($data);
    }

    public function updateCustomer(array $data, string $ID)
    {
        return Customer::where('id', $ID)->update($data);
    }

    public function deleteCustomer(string $ID)
    {
        return Customer::find($ID)->delete();
    }
}
