<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index(Request $request)
    {
        $query = Supplier::query();

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
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->	contact_person = $request->	contact_person;
            $supplier->	email  = $request->	email ;
            $supplier->phone = $request->phone;
            $supplier->photo = $request->photo;
            $supplier->address = $request->address;

            date_default_timezone_set("Asia/Dhaka");
            $supplier->created_at = date('Y-m-d H:i:s');
            $supplier->updated_at = date('Y-m-d H:i:s');

            if (isset($request->photo)) {
                $supplier->photo = $request->photo;
            }

            $supplier->save();
            if (isset($request->photo)) {
                $imageName = $supplier->id . '.' . $request->photo->extension();
                $supplier->photo = $imageName;
                $supplier->update();
                $request->photo->move(public_path('img'), $imageName);
            }
            return response()->json(["supplier" =>  $supplier]);
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
            $supplier =  Supplier::find($id);
            return response()->json(["supplier" =>  $supplier]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {try {
        $supplier =  Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->	contact_person = $request->	contact_person;
        $supplier->	email  = $request->	email ;
        $supplier->phone = $request->phone;
        $supplier->photo = $request->photo;
        $supplier->address = $request->address;

        date_default_timezone_set("Asia/Dhaka");
        $supplier->created_at = date('Y-m-d H:i:s');
        $supplier->updated_at = date('Y-m-d H:i:s');

        if (isset($request->photo)) {
            $supplier->photo = $request->photo;
        }

        $supplier->save();
        if (isset($request->photo)) {
            $imageName = $supplier->id . '.' . $request->photo->extension();
            $supplier->photo = $imageName;
            $supplier->update();
            $request->photo->move(public_path('img'), $imageName);
        }
        return response()->json(["supplier" =>  $supplier]);
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
            $deleteSupplier =  Supplier::destroy($id);
            return response()->json(["deleted" =>  $deleteSupplier]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
}
