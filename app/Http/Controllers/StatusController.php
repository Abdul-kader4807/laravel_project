<?php

namespace App\Http\Controllers;

use App\Models\status;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function index()
    {
        $statuses = status::paginate(3);
        // print_r($statuses);
        return view('statuses.index', compact('statuses'));
    }


    public function create()
    {
        return view('statuses.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',

        ]);
        $status = new Status();
        $status->name = $request->name;
        if ($status->save()) {
            return redirect('status')->with('success', "Status has been registred");
        };
    }


    public function show($id)
    {
        $status = Status::find($id);
        return view('statuses.show', compact('status'));
    }




    public function edit($id)
    {

        $status = Status::find($id);
        // $status = Status::where('id', $id)->get();

        return view('statuses.update', compact('status'));
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4',

        ]);
        // print_r($status->all());
        $status = Status::find($id);
        $status->name = $request->name;

        if ($status->save()) {
            return redirect('status')->with('status', "Status has been update");
        }
    }

    public function destroy_view($id)

    {
        $status = Status::find($id);
        return view('statuses.delete', compact('status'));
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
        return view('statuses.index', compact('statuses', 'requestdata'));
        if ($statuses) {
            return view('statuses.index', compact('statuses'));
        } else {
            $statuses = [];
        }
    }


}
