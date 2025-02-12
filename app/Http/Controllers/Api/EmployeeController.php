<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employee;

    public function __construct()
    {
        $this->employee = new EmployeeService();
    }

    public function getDatatable(Request $request)
    {
        return $this->employee->getDatatable($request->all());
    }
}
