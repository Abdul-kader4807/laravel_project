<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }
        return response()->json($query->paginate(5));
    }




    public function store(Request $request)
    {
        try {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->photo = $request->photo;
            $customer->phone = $request->phone;
            $customer->address = $request->address;

            date_default_timezone_set("Asia/Dhaka");
            $customer->created_at = date('Y-m-d H:i:s');
            $customer->updated_at = date('Y-m-d H:i:s');

            if (isset($request->photo)) {
                $customer->photo = $request->photo;
            }

            $customer->save();
            if (isset($request->photo)) {
                $imageName = $customer->id . '.' . $request->photo->extension();
                $customer->photo = $imageName;
                $customer->update();
                $request->photo->move(public_path('photo'), $imageName);
            }
            return response()->json(["customer" =>  $request->all()]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $customer =  Customer::find($id);
            return response()->json(["customer" =>  $customer]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $customer =  Customer::find($id);
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->photo = $request->photo;
            $customer->phone = $request->phone;
            $customer->address = $request->address;

            date_default_timezone_set("Asia/Dhaka");
            $customer->created_at = date('Y-m-d H:i:s');
            $customer->updated_at = date('Y-m-d H:i:s');

            if (isset($request->photo)) {
                $customer->photo = $request->photo;
            }

            $customer->save();
            if (isset($request->photo)) {
                $imageName = $customer->id . '.' . $request->photo->extension();
                $customer->photo = $imageName;
                $customer->update();
                $request->photo->move(public_path('photo'), $imageName);
            }
            return response()->json(["customer" =>  $customer]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deleteCustomer =  Customer::destroy($id);
            return response()->json(["deleted" =>  $deleteCustomer]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }




}
