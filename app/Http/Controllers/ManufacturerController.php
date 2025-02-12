<?php

namespace App\Http\Controllers;


use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{

    public function index()
    {  // $manufacturers = Manufacturer::get();
        // print_r($manufacturers);


        $manufacturers = Manufacturer::all();
        $manufacturers = Manufacturer::paginate(4);
        return view('manufacturers.index', compact('manufacturers'));
    }


    public function create()
    {
        return view('manufacturers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|min:4',
            'phone'  => 'required|min:4|numeric',
            'email'  => 'required|email',
            'address' => 'required|min:3',
            'country' => 'required|min:3',
        ]);
        $manufacturer = new Manufacturer();
        $manufacturer->name = $request->name;
        $manufacturer->phone = $request->phone;
        $manufacturer->email = $request->email;
        $manufacturer->address = $request->address;
        $manufacturer->country = $request->country;

        if ($manufacturer->save()) {
            return redirect('manufacturer')->with('success', "Manufacturer has been registered");
        };
    }


    public function show($id)
    {
        $manufacturers = Manufacturer::find($id);
        return view('manufacturers.show' ,compact('manufacturers'));
    }


    public function edit($id)
    {
        $manufacturer = Manufacturer::find($id);
         // $manufacturer=Manufacturer::where('id',$id)->get();
        return view('manufacturers.update',compact('manufacturer'));
    }


    public function update(Request $request,$id)
    { $request->validate([
        'name'   => 'required|min:5',
        'phone'  => 'required|min:4|numeric',
        'email'  => 'required|email',
        'address' => 'required|min:3',
        'country' => 'required|min:3',
    ]);

    // print_r($request->all());
    $manufacturer = Manufacturer::find($id);
    $manufacturer->name = $request->name;
    $manufacturer->phone = $request->phone;
    $manufacturer->email = $request->email;
    $manufacturer->address = $request->address;
    $manufacturer->country = $request->country;


    if ($manufacturer->save()) {
        return redirect('manufacturer')->with('success', "Manufacturer has been updated");
    };

    }





    public function destroy_view($id)
    {
        $manufacturer = Manufacturer::find($id);
        return view('manufacturers.delete', compact('manufacturer'));
    }




    public function destroy($id)
    {

        $del = Manufacturer::destroy($id);

        if ($del) {
            return redirect('manufacturer')->with('success', "manufacturer has been deleted");
        }
    }

    public function search(Request $request)
    {
        $manufacturers = Manufacturer::where('name', "like", "%{$request->name}%")->paginate(4);
        $requestdata = $request->name;

        return view('manufacturers.index', compact('manufacturers', 'requestdata'));

        if($manufacturers){
            return view('manufacturers.index',compact('manufacturers'));
        }else{
            $manufacturers =[];
        }
    }





}


