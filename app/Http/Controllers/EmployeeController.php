<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    protected $employee;

    public function __construct()
    {
        $this->employee = new EmployeeService();
    }
    public function index()
    {
        return view('employee.index');
    }

    public function create()
    {
        return view('employee.add');
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $request->validate([
                    'name' => 'required|string',
                ]);
                $data = [
                    'name' => $request->name,
                    'email' => $request->email ?? null,
                    'phone_number' => $request->phone_number,
                    'whatsapp' => $request->whatsapp,
                    'province' => $request->province,
                    'city' => $request->city,
                    'district' => $request->district,
                    'urban_village' => $request->urban_village,
                    'address' => $request->address,
                    'additional_address' => $request->additional_address ?? null,
                    'joined_at' => $request->joined_at ?? now(),
                    'created_on' => $request->joined_at ?? now(),
                ];
                $employee = $this->employee->createEmployee($data);
            });

            return redirect()->route('employee')->with('sucess', 'Data Berhasil Disimpan');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    public function show(string $uuid)
    {
        $employee = $this->employee->getEmployeeByUuid($uuid);
        return view('employee.show', compact('employee'));
    }

    public function edit(string $uuid)
    {
        $employee = $this->employee->getEmployeeByUuid($uuid);
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, string $uuid)
    {
        try {
            DB::transaction(function () use ($request, $uuid) {
                $employee = $this->employee->getEmployeeByUuid($uuid);
                $employee->update($request->all());
            });
            return redirect()->route('employee')->with('success', 'Data Berhasil Diubah');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    public function destroy(string $uuid)
    {
        try {
            DB::transaction(function () use ($uuid) {
                $employee = $this->employee->getEmployeeByUuid($uuid);
                $employee->delete();
            });
            return view('employee.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }
    }
}
