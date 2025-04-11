<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        $query = Warehouse::query();

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
            $warehouse = new Warehouse();
            $warehouse->name = $request->name;
            $warehouse->phone = $request->phone;
            $warehouse->location = $request->location;
            $warehouse->address = $request->address;


            date_default_timezone_set("Asia/Dhaka");
            $warehouse->created_at = date('Y-m-d H:i:s');
            $warehouse->updated_at = date('Y-m-d H:i:s');



            $warehouse->save();
            return response()->json(["warehouse" =>  $warehouse]);
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
            $warehouse =  Warehouse::find($id);
            return response()->json(["warehouse" =>  $warehouse]);
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
            $warehouse =  Warehouse::find($id);
            $warehouse->name = $request->name;
            $warehouse->phone = $request->phone;
            $warehouse->location = $request->location;
            $warehouse->address = $request->address;


            date_default_timezone_set("Asia/Dhaka");
            $warehouse->created_at = date('Y-m-d H:i:s');
            $warehouse->updated_at = date('Y-m-d H:i:s');



            $warehouse->save();
            return response()->json(["warehouse" =>  $warehouse]);
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
            $deleteWarehouse =  Warehouse::destroy($id);
            return response()->json(["deleted" =>  $deleteWarehouse]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
}
