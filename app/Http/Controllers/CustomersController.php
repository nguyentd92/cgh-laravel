<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Exception;

class CustomersController extends Controller
{
    public function getList(Request $request)
    {

        $customers = Customer::where('name', 'LIKE' ,'%'.$request->keyword.'%')
            ->orWhere('phone', 'LIKE' ,'%'.$request->keyword.'%')
            ->orWhere('address', 'LIKE' ,'%'.$request->keyword.'%')
            ->get();

        return view('customers.list', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        $customer->save();

        return view('customers.create');
    }

    public function getById()
    {
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customers.edit', compact('customer'));
    }

    public function update($id, Request $request)
    {
        // Tìm customer từ DB
        $customer = Customer::findOrFail($id);

        // Gán các thuộc tính mới
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        // Lưu
        $customer->save();

        return view('customers.edit', compact('customer'));
    }

    public function delete()
    {
        return view('customers.delete');
    }

    public function destroy($id)
    {
        Customer::destroy($id);

        return redirect('/customers');
    }
}
