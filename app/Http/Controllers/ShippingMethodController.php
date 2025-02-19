<?php

namespace App\Http\Controllers;

use App\Models\ShippingMethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippingMethods = ShippingMethod::all();
        return view('dashboard.admin.shipping_methods.index', compact('shippingMethods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.shipping_methods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
        ]);

        ShippingMethod::create($request->all());

        return redirect()->route('shippings.index')->with('success', 'Shipping method created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShippingMethod $shippingMethod)
    {
        return view('dashboard.admin.shipping_methods.edit', compact('shippingMethod'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShippingMethod $shippingMethod)

    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
        ]);

        $shippingMethod->update($request->all());

        return redirect()->route('shippings.index')->with('success', 'Shipping method updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShippingMethod $shippingMethod)
    {
        $shippingMethod->delete();

        return redirect()->route('shippings.index')->with('success', 'Shipping method deleted successfully!');
    }
}
