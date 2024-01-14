<?php

namespace App\Http\Controllers\User;

use App\Models\Invoice;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Facades\GeneratePDF;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public $business_id;
    public function __construct()
    {
    }
    public function index()
    {
        $business_id = Auth::guard('user')->user()->business_id;
         $data = Invoice::where('business_id', $business_id)->get();
        return view('user.resources.invoice.index', compact('data'));
    }

    public function create()
    {
        $states = State::all();
        return view('user.resources.invoice.create', compact('states'));
    }

    public function store(Request $request)
    {
        Invoice::updateOrCreate([
            'sku' => $request->sku,
            'name' => $request->name,
            'description' => $request->description,
            'mrp' => $request->mrp,
            'sale_price' => $request->sale_price,
            'purchase_price' => $request->purchase_price,
            'quantity' => $request->quantity,
            'business_id' => Auth::guard('user')->user()->business_id,
        ]);
        return redirect()->route('invoice.index')->with('success', 'New invoice added successfully');
    }

    public function show(string $id)
    {
        $business_id = Auth::guard('user')->user()->business_id;
        $data = Invoice::where('business_id', $business_id)->where('id', $id)->with('business')->firstOrFail();
        return view('user.resources.invoice.show', compact('data'));
    }

    public function edit(string $id)
    {
        $states = State::all();
        $business_id = Auth::guard('user')->user()->business_id;
        $data = Invoice::where('business_id', $business_id)->where('id', $id)->firstOrFail();
        return view('user.resources.invoice.edit', compact('data', 'states'));
    }

    public function update(Request $request, string $id)
    {
        Invoice::updateOrCreate(
            ['id' => $id],
            [
                'sku' => $request->sku,
                'name' => $request->name,
                'description' => $request->description,
                'sale_price' => $request->sale_price,
                'purchase_price' => $request->purchase_price,
                'quantity' => $request->quantity,
            ]
        );
        return redirect()->route('invoice.index')->with('success', 'Invoice data updated successfully');
    }

    public function generate(string $id)
    {
        return GeneratePDF::taxInvoice($id, 'original');
    }

    public function destroy(string $id)
    {
        //
    }
}
