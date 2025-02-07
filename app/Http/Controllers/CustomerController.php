<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct() {
        $this->customer = new CustomerService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.index');
    }

    public function create()
    {
        return view('customer.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $request->validate([
                'name' => 'required|string',
                'phone_number' => 'required|string|max:255',
                // 'whatsApp' => ['required', 'string', 'max:255'],
                // 'province' => ['required', 'string', 'max:255'],
                // 'city' => ['required', 'string', 'max:255'],
                // 'district' => ['required', 'string', 'max:255'],
                // 'urban_village' => ['required', 'string', 'max:255'],
                // 'address' => ['required', 'string', 'max:255'],
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
            ];
            $customer = $this->customer->createCustomer($data);

            return redirect()->route('customer')->with('success', 'Data berhasil disimpan');
        } catch (ValidationException $err) {
            return redirect()->back()->withErrors($err->validator)->withInput();
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        try {
            $customer = $this->customer->getCustomerByUuid($uuid);
        } catch (\Exception $err) {
            //throw $th;
        }
    }

    public function edit(string $uuid)
    {
        try {
            $customer = $this->customer->getCustomerByUuid($uuid);
            return view('customer.edit', compact('customer'));
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        try {
            $customer = $this->customer->getCustomerByUuid($uuid);
            // dd($customer, $request->all());
            $customer->update($request->all());
            return redirect('customer')->with('success', 'Data Berhasil Diubah');
            
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        try {
            $customer = $this->customer->getCustomerByUuid($uuid);
            $customer->delete();
            return redirect('customer')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $err) {
            //throw $th;
        }
    }
}
