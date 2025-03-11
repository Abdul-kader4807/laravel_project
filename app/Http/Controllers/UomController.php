<?php

namespace App\Http\Controllers;

use App\Models\Uom;
use Illuminate\Http\Request;

class UomController extends Controller
{

    public function index()
    {
        // $uoms = Uom::all();
        $uoms = Uom::paginate(10);
        return view('pages.uoms.index', compact('uoms'));
    }


    public function create()
    {
        return view('pages.uoms.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2'
        ]);
        $uom = new Uom();
        $uom->name = $request->name;
        if ($uom->save()) {
            return redirect('uom')->with('success', "Uom has been registred");
        };
    }


    public function show($id)
    {
        $uom = Uom::find($id);
        return view('pages.uoms.show',compact('uom'));
    }


    public function edit( $id)
    {
        $uom = Uom::find($id);
        // $uom = Uom::where('id', $id)->get();

        return view('pages.uoms.update' , compact('uom'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2'
        ]);
        $uom = Uom::find($id);
        $uom->name = $request->name;
        if ($uom->save()) {
            return redirect('uom')->with('success', "Uom has been updated");
        };

    }


    public function destroy_view($id)

    {
        $uom = Uom::find($id);
        return view('pages.uoms.delete', compact('uom'));
    }


    public function destroy($id)
    {
        $del = Uom::destroy($id);
        if ($del) {
            return redirect('uom')->with('success', "Uom has been deleted");
        }
    }

    public function search(Request $request)
    {
        $uoms = Uom::where('name', "like", "%{$request->name}%")->paginate(4);
        $requestdata = $request->name;
        return view('pages.uoms.index', compact('uoms', 'requestdata'));
        if ($uoms) {
            return view('pages.uoms.index', compact('uoms'));
        } else {
            $uoms = [];
        }
    }






}
