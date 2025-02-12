<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class EmployeeService
{
    public function getEmployees(array $params = [])
    {
        return Employee::all();
    }

    public function getDatatable(array $params = [])
    {
        return DataTables::of($this->getEmployees($params))->make(true);
    }

    public function getEmployee(string $ID)
    {
        return Employee::find($ID);
    }

    public function getEmployeeByUuid(string $uuid)
    {
        return Employee::where('uuid', $uuid)->first();
    }

    public function createEmployee(array $data)
    {
        return Employee::create($data);
    }

    public function updateEmployee(array $data, string $ID)
    {
        return Employee::where('id', $ID)->update($data);
    }

    public function deleteEmployee(string $ID)
    {
        return Employee::find($ID)->delete();
    }
}
