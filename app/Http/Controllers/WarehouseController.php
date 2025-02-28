<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{

    public function index()
    {
        // $warehouses =Warehouse::get();
        // print_r($warehouses);

        // $warehouses = Warehouse::all();
        $warehouses = Warehouse::paginate(10);

        return view('pages.warehouse.index', compact('warehouses'));
    }


    public function create()
    {
        return view('pages.warehouse.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required|min:4|numeric',
            'location' => 'required|min:3',
            'address' => 'required|min:3',
        ]);

        $warehouse = new Warehouse();
        $warehouse->name = $request->name;
        $warehouse->phone = $request->phone;
        $warehouse->location = $request->location;
        $warehouse->address = $request->address;

        if ($warehouse->save()) {
            return redirect('warehouse')->with('success', "warehouse has been registered");
        };
    }


    public function show($id)
    {
        $warehouse = Warehouse::find($id);
        return view('pages.warehouse.show', compact('warehouse'));
    }




    public function edit($id)
    {
        $warehouse = Warehouse::find($id);
        // $warehouse = Warehouse::where('id',$id)->get();
        return view('pages.warehouse.update', compact('warehouse'));
    }


    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required|min:4|numeric',
            'location' => 'required|min:3',
            'address' => 'required|min:3',
        ]);
        // print_r($request->all();)
        $warehouse = Warehouse::find($id);
        $warehouse->name = $request->name;
        $warehouse->phone = $request->phone;
        $warehouse->location = $request->location;
        $warehouse->address = $request->address;
        if ($warehouse->save()) {
            return redirect('warehouse')->with('success', "warehouse has been updated");
        };
    }


    public function destroy_view($id)
    {
        $warehouse = Warehouse::find($id);
        return view('pages.warehouse.delete', compact('warehouse'));
    }



    public function destroy(string $id)
    {
        $del = Warehouse::destroy($id);
        if($del){
            return redirect('warehouse')->with('success', "warehouse has been deleted");
        }
        }

        public function search(Request $request)
        {
            $warehouses = Warehouse::where('name', "like", "%{$request->name}%")->paginate(3);
            $requestdata = $request->name;

            return view('pages.warehouse.index', compact('warehouses', 'requestdata'));

            if($warehouses){
                return view('pages.warehouse.index',compact('warehouses'));
            }else{
                $warehouses =[];
            }
        }





    }













