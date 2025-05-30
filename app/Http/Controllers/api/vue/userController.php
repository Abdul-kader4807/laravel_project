<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }
        return response()->json($query->paginate(4));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = new User;
            $user->name = $request->name;
            // $user->role_id = $request->role_id;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            date_default_timezone_set("Asia/Dhaka");
            $user->created_at = date('Y-m-d H:i:s');
            $user->updated_at = date('Y-m-d H:i:s');

            if (isset($request->photo)) {
                $user->photo = $request->photo;
            }

            $user->save();
            if (isset($request->photo)) {
                $imageName = $user->id . '.' . $request->photo->extension();
                $user->photo = $imageName;
                $user->update();
                $request->photo->move(public_path('img'), $imageName);
            }
            return response()->json(["roles" =>  $user]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user =  User::find($id);
            return response()->json(["user" =>  $user]);
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
            $user = User::find($id);
            $user->name = $request->name;
            // $user->role_id = $request->role_id;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            date_default_timezone_set("Asia/Dhaka");
            $user->created_at = date('Y-m-d H:i:s');
            $user->updated_at = date('Y-m-d H:i:s');

            if (isset($request->photo)) {
                $user->photo = $request->photo;
            }

            $user->save();
            if (isset($request->photo)) {
                $imageName = $user->id . '.' . $request->photo->extension();
                $user->photo = $imageName;
                $user->update();
                $request->photo->move(public_path('img'), $imageName);
            }
            return response()->json(["roles" =>  $user]);
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
            $deleteUser =  User::destroy($id);
            return response()->json(["deleted" =>  $deleteUser]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

}
