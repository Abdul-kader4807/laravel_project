<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function index()
    {
        // $suppliers=Supplier::get();
        $suppliers = Supplier::paginate(3);

        // print_r($suppliers);

        return view('pages.suppliers.index', compact('suppliers'));
    }


    public function create()
    {
        return view('pages.suppliers.create');
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
        $photoPath = public_path('photo/' . $photoname);
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
        $request->file('photo')->move(public_path('photo'), $photoname);
        $supplier->photo = $photoname;

        if ($supplier->save()) {
            return redirect('supplier')->with('success', "Supplier  has been registred");
        };
    }





    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('pages.suppliers.show', compact('supplier'));
    }


    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('pages.suppliers.update', compact('supplier'));
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5',
            'contact_person' => 'required|min:5',
            'phone'  => 'required|min:4|numeric',
            'email' => 'required|email',
            'address' => 'required|min:4',
            'photo'  => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        // print_r($request->all());


        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->contact_person = $request->contact_person;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $photoname = $request->name . "." . $request->file('photo')->extension();

        $photoPath = public_path('photo/' . $photoname);
        if (file_exists($photoPath)) {
            unlink($photoPath);
            $request->file('photo')->move(public_path('photo'), $photoname);
            $supplier->photo = $photoname;
        } else {
            $supplier->photo = $supplier->photo;
        }


        if ($supplier->save()) {
            return redirect('supplier')->with('success', "Supplier  has been updated");
        };
    }


    public function destroy_view($id)
    {
        $supplier = Supplier::find($id);
        return view('pages.suppliers.delete', compact('supplier'));
    }



    public function destroy($id)
    {
        $del = Supplier::destroy($id);
        if ($del) {
            return redirect('supplier')->with('success', "supplier has been deleted");
        }
    }


    public function search(Request $request)
    {
        $suppliers = Supplier::where('name', "like", "%{$request->name}%")->paginate(3);
        $requestdata = $request->name;
        return view('pages.suppliers.index', compact('suppliers', 'requestdata'));

        if ($suppliers) {
            return view('pages.suppliers.index', compact('suppliers'));
        } else {
            $suppliers = [];
        }
    }
}
