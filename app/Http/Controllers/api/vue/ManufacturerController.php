<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index(Request $request)
    {
        $query = Manufacturer::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }
        return response()->json($query->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $manufacturer = new Manufacturer();
            $manufacturer->name = $request->name;
            $manufacturer->phone = $request->phone;
            $manufacturer->email = $request->email;
            $manufacturer->country = $request->country;
            $manufacturer->address = $request->address;
            date_default_timezone_set("Asia/Dhaka");
            $manufacturer->created_at = date('Y-m-d H:i:s');
            $manufacturer->updated_at = date('Y-m-d H:i:s');



            $manufacturer->save();

            return response()->json(["manufacturer" =>  $manufacturer]);
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
            $manufacturer =  Manufacturer::find($id);
            return response()->json(["manufacturer" =>  $manufacturer]);
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
            $manufacturer =  Manufacturer::find($id);
            $manufacturer->name = $request->name;
            $manufacturer->phone = $request->phone;
            $manufacturer->email = $request->email;
            $manufacturer->country = $request->country;
            $manufacturer->address = $request->address;
            date_default_timezone_set("Asia/Dhaka");
            $manufacturer->created_at = date('Y-m-d H:i:s');
            $manufacturer->updated_at = date('Y-m-d H:i:s');



            $manufacturer->save();

            return response()->json(["manufacturer" =>  $manufacturer]);
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
            $deleteManufacturer =  Manufacturer::destroy($id);
            return response()->json(["deleted" =>  $deleteManufacturer]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }


}
