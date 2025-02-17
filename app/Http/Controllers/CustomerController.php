<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        // $customers = Customer::get();
        $customers = Customer::paginate(4);
        // print_r($customers);

        return view('pages.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('pages.customers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|min:5',
            'phone'  => 'required|min:4|numeric',
            'email'  => 'required|email',
            'address' => 'required|min:4',
            //|in:Dhaka,Comilla
            'photo'  => 'required|image|mimes:png,jpg,jpeg|max:2048',

        ]);
// requred dite caile evabehobe, ['address.in' => "Address must be inbetween Dhaka or Comilla",]
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $photoname = $request->name . "." . $request->file('photo')->extension();
        $photoPath = public_path('photo/' . $photoname);
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        $request->file('photo')->move(public_path('photo'), $photoname);
        $customer->photo = $photoname;

        if ($customer->save()) {
            return redirect('customer')->with('success', "Customer has been registred");
        };
    }



    public function show($id)
    {
        $customer = Customer::find($id);
        return view('pages.customers.show', compact('customer'));
    }



    public function edit($id)
    {
        $customer = Customer::find($id);
        // $customer=Customer::where('id',$id)->get();
        return view('pages.customers.update', compact('customer'));
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|min:5',
            'phone'  => 'required|min:4|numeric',
            'email'  => 'required|email',
            'address' => 'required|min:4',
            'photo'  => 'required|image|mimes:png,jpg,jpeg|max:2048',

        ]);
//['address.in' => "Address must be inbetween Dhaka or Comilla",] requerid
        // print_r($request->all());

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $photoname = $request->name . "." . $request->file('photo')->extension();

        $photoPath = public_path('photo/' . $photoname);
        if (file_exists($photoPath)) {
            unlink($photoPath);

            $request->file('photo')->move(public_path('photo'), $photoname);

            $customer->photo = $photoname;
        }else{
            $customer->photo =$customer->photo ;
        }


        if ($customer->save()) {
            return redirect('customer')->with('success', "Customer has been updated");
        };
    }


    public function destroy_view($id)
    {
        $customer = Customer::find($id);
        return view('pages.customers.delete', compact('customer'));
    }

    public function destroy($id)
    {
        $del = Customer::destroy($id);
        if ($del) {
            return redirect('customer')->with('success', "Customer has been Deleted");
        }
    }



    public function search(Request $request)
    {
        $customers = Customer::where('name', "like", "%{$request->name}%")->paginate(4);
        $requestdata = $request->name;

        return view('pages.customers.index', compact('customers', 'requestdata'));

        if ($customers) {
            return view('pages.customers.index', compact('customers'));
        } else {
            $customers = [];
        }
    }



}
