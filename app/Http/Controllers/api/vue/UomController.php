<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Uom;
use Illuminate\Http\Request;

class UomController extends Controller
{
    public function index(Request $request)
    {
        $query = Uom::query();

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
            $uom = new Uom();
            $uom->name = $request->name;


            date_default_timezone_set("Asia/Dhaka");
            $uom->created_at = date('Y-m-d H:i:s');
            $uom->updated_at = date('Y-m-d H:i:s');



            $uom->save();

            return response()->json(["uom" =>  $uom]);
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
            $uom =  Uom::find($id);
            return response()->json(["uom" =>  $uom]);
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
            $uom = Uom::find($id);
            $uom->name = $request->name;


            date_default_timezone_set("Asia/Dhaka");
            $uom->created_at = date('Y-m-d H:i:s');
            $uom->updated_at = date('Y-m-d H:i:s');



            $uom->save();

            return response()->json(["uom" =>  $uom]);
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
            $deleteUom =  Uom::destroy($id);
            return response()->json(["deleted" =>  $deleteUom]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
}
