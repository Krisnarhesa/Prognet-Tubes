<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penjualan;
use App\Models\detailpenjualan;

class PenjualanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [penjualan::all(), detailpenjualan::all()];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penjualan = new penjualan();
        $penjualan->fill($request->all())->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return penjualan::find($id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penjualan = penjualan::find($id);
        $penjualan->fill($request->all())->save();
        return $penjualan;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penjualan = penjualan::find($id);
        $penjualan->delete();
    }
}
