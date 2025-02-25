<?php

namespace App\Http\Controllers;

use App\Models\PaymentStatus;
use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{

    public function index()
    {
        // $payment_status = PaymentStatus::all();
        $payment_statuses = PaymentStatus::paginate(4);
        // print_r($payment_status);
        return view('pages.paymentStatus.index', compact('payment_statuses'));
    }


    public function create()
    {
        return view('pages.paymentStatus.create');
    }




    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|max:100',

        ]);
        $payment_status = new PaymentStatus();
        $payment_status->name = $request->name;
        $payment_status->description = $request->description;
        if ($payment_status->save()) {
            return redirect('payment_status')->with('success', "payment_status has been registred");
        };
    }


    public function show(string $id)
    {
        $payment_status = PaymentStatus::find($id);
        return view('pages.paymentStatus.show', compact('payment_status'));
    }




    public function edit(string $id)
    {
        $payment_status = PaymentStatus::find($id);
        // $payment_status = PaymentStatus::where('id', $id)->get();

        return view('pages.paymentStatus.update', compact('payment_status'));
    }



    public function update(Request $request, string $id)
    {
       $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|max:100',

        ]);
        // print_r($payment_status->all());
        $payment_status = PaymentStatus::find($id);
        $payment_status->name = $request->name;
        $payment_status->description = $request->description;

        if ($payment_status->save()) {
            return redirect('payment_status')->with('payment_status', "PaymentStatus has been update");
        }
    }


    public function destroy_view($id)

    {
        $payment_status = PaymentStatus::find($id);
        return view('pages.paymentStatus.delete', compact('payment_status'));
    }

    public function destroy(string $id)
    {
        $del = PaymentStatus::destroy($id);
        if ($del) {
            return redirect('payment_status')->with('success', "PaymentStatus has been deleted");
        }
    }



    public function search(Request $request)
    {
        $payment_statuses = PaymentStatus::where('name', "like", "%{$request->name}%")->paginate(4);
        $requestdata = $request->name;
        return view('pages.paymentStatus.index', compact('payment_statuses', 'requestdata'));
        if ($payment_statuses) {
            return view('pages.paymentStatus.index', compact('payment_statuses'));
        } else {
            $payment_statuses = [];
        }
    }











}
