<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function index()
    {

        return view('suppliers.index');
    }


    public function create()
    {
        return view('suppliers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'contact_person' => 'required|min:5',
            'phone'  => 'required|min:4|numeric',
            'email' => 'required|email',
            'address' => 'required|min:4',
            'photo'  => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->contact_person = $request->contact_person;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $photoname = $request->name . "." . $request->file('photo')->extension();
        $request->file('photo')->move(public_path('photo'), $photoname);
        $supplier->photo = $photoname;

        if ($supplier->save()) {
            return redirect('supplier')->with('success', "Supplier  has been registred");
        };
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
