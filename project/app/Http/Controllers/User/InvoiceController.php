<?php

namespace App\Http\Controllers\User;

use App\Models\State;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\InvoiceProduct;
use Illuminate\Support\Facades\Auth;
use App\Services\Facades\GeneratePDF;

class InvoiceController extends Controller
{
    public $business_id;
    public function __construct()
    {
    }
    public function index()
    {
        $business_id = Auth::guard('user')->user()->business_id;
         $data = Invoice::where('business_id', $business_id)->with('products')
        ->withSum([
            'products' => fn ($query) => $query->select(DB::raw('sum(quantity*sale_price*(1+0.01*gst_percentage))'))
        ], 'amount')
        ->get();
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
        $data = Invoice::where('business_id', $business_id)->where('id', $id)
        ->with('products', 'customerState', 'businessState')
        ->firstOrFail();
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
                'customer_name' => $request->customer_name,
                'customer_gstin' => $request->customer_gstin,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'customer_address' => $request->customer_address,
                'customer_city' => $request->customer_city,
                'customer_state_id' => $request->customer_state_id,
                'business_name' => $request->business_name,
                'business_gstin' => $request->business_gstin,
                'business_phone' => $request->business_phone,
                'business_email' => $request->business_email,
                'business_address' => $request->business_address,
                'business_city' => $request->business_city,
                'business_state_id' => $request->business_state_id,
            ]
        );
        return redirect()->route('invoice.show', $id)->with('success', 'Invoice data updated successfully');
    }

    public function generate(string $id, string $copy = 'original')
    {
        return GeneratePDF::taxInvoice($id, $copy);
    }

    public function edit_invoice_product($id) 
    {
        $data = InvoiceProduct::findOrFail($id);
        return view('user.resources.invoice.edit_product', compact('data'));
    }
    public function update_invoice_product(Request $request, $id) 
    {
       $data = InvoiceProduct::find($id);
       $data->update([
            'name' => $request['name'],
                'description' => $request->description,
                'sale_price' => $request->sale_price,
                'quantity' => $request->quantity,
                'hsn_code' => $request->hsn_code,
                'gst_percentage' => $request->gst_percentage,
        ]);
        return redirect()->route('invoice.show', $data['invoice_id'])->with('success', 'Invoice data updated successfully');
    }

    public function destroy(string $id)
    {
        //
    }
}
