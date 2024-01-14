<?php

namespace App\Http\Controllers\User;

use App\Models\State;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public $business_id;
    public function __construct()
    {
    }
    public function index()
    {
        $business_id = Auth::guard('user')->user()->business_id;
        $data = Product::where('business_id', $business_id)->get();
        return view('user.resources.product.index', compact('data'));
    }

    public function create()
    {
        $states = State::all();
        return view('user.resources.product.create', compact('states'));
    }

    public function store(ProductRequest $request)
    {
        Product::updateOrCreate([
            'sku' => $request->sku,
            'name' => $request->name,
            'description' => $request->description,
            'sale_price' => $request->sale_price,
            'quantity' => $request->quantity,
            'business_id' => Auth::guard('user')->user()->business_id,
        ]);
        return redirect()->route('product.index')->with('success', 'New product added successfully');
    }

    public function show(string $id)
    {
        $business_id = Auth::guard('user')->user()->business_id;
        $data = Product::where('business_id', $business_id)->where('id', $id)->with('business')->firstOrFail();
        return view('user.resources.product.show', compact('data'));
    }

    public function edit(string $id)
    {
        $states = State::all();
        $business_id = Auth::guard('user')->user()->business_id;
        $data = Product::where('business_id', $business_id)->where('id', $id)->firstOrFail();
        return view('user.resources.product.edit', compact('data', 'states'));
    }

    public function update(ProductRequest $request, string $id)
    {
        Product::updateOrCreate(
            ['id' => $id],
            [
                'sku' => $request->sku,
                'name' => $request->name,
                'description' => $request->description,
                'sale_price' => $request->sale_price,
                'quantity' => $request->quantity,
            ]
        );
        return redirect()->route('product.index')->with('success', 'Product data updated successfully');
    }

    public function destroy(string $id)
    {
        //
    }
}
