<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $query = Status::query();

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
            $status = new Status();
            $status->name = $request->name;

            $status->description = $request->description;
            date_default_timezone_set("Asia/Dhaka");
            $status->created_at = date('Y-m-d H:i:s');
            $status->updated_at = date('Y-m-d H:i:s');



            $status->save();

            return response()->json(["status" =>  $status]);
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
            $status =  Status::find($id);
            return response()->json(["status" =>  $status]);
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
            $status = Status::find($id);
            $status->name = $request->name;

            $status->description = $request->description;
            date_default_timezone_set("Asia/Dhaka");
            $status->created_at = date('Y-m-d H:i:s');
            $status->updated_at = date('Y-m-d H:i:s');



            $status->save();

            return response()->json(["status" =>  $status]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { try {
        $deleteStatus =  Status::destroy($id);
        return response()->json(["deleted" =>  $deleteStatus]);
    } catch (\Throwable $th) {
        return response()->json(["error" => $th->getMessage()]);
    }
    }


}
