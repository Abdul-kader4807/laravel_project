<?php

namespace App\Http\Controllers;

use App\Models\status;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function index()
    {
        $status = Status::all();
        $statuses = Status::paginate(2);
        // print_r($statuses);
        return view('pages.status.index', compact('statuses','status'));
    }


    public function create()
    {
        return view('pages.status.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',

        ]);
        $status = new Status();
        $status->name = $request->name;
        $status->description = $request->description;
        if ($status->save()) {
            return redirect('status')->with('success', "Status has been registred");
        };
    }


    public function show($id)
    {
        $status = Status::find($id);
        return view('pages.status.show', compact('status'));
    }




    public function edit($id)
    {

        $status = Status::find($id);
        // $status = Status::where('id', $id)->get();

        return view('pages.status.update', compact('status'));
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',

        ]);
        // print_r($status->all());
        $status = Status::find($id);
        $status->name = $request->name;
        $status->description = $request->description;

        if ($status->save()) {
            return redirect('status')->with('status', "Status has been update");
        }
    }

    public function destroy_view($id)

    {
        $status = Status::find($id);
        return view('pages.status.delete', compact('status'));
    }

    public function destroy($id)
    {
        $del = Status::destroy($id);
        if ($del) {
            return redirect('status')->with('success', "Sutatus has been deleted");
        }
    }

    public function search(Request $request)
    {
        $statuses = Status::where('name', "like", "%{$request->name}%")->paginate(3);
        $requestdata = $request->name;
        return view('pages.status.index', compact('statuses', 'requestdata'));
        if ($statuses) {
            return view('pages.status.index', compact('statuses'));
        } else {
            $statuses = [];
        }
    }


}
