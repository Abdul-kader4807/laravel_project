<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }
        return response()->json($query->paginate(10));
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
            $customer->mobile = $request->mobile;
            $customer->save();
            if (isset($request->photo)) {
                $imageName = $customer->id . '.' . $request->photo->extension();
                $customer->photo = $imageName;
                $customer->update();
                $request->photo->move(public_path('img'), $imageName);
            }
            return response()->json(["customer" =>  $customer]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
