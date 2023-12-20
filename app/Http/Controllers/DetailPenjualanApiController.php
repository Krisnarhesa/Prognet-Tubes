<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detailpenjualan;

class DetailPenjualanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $penjualanId = $request->input('penjualan_id');

        $query = $penjualanId ? detailpenjualan::where('penjualan_id', $penjualanId) : detailpenjualan::all();
    
        return $query->get();
        //return detailpenjualan::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $detailpenjualan = new detailpenjualan();
        $detailpenjualan->fill($request->all())->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return detailpenjualan::find($id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detailpenjualan = detailpenjualan::find($id);
        $detailpenjualan->fill($request->all())->save();
        return $detailpenjualan;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detailpenjualan = detailpenjualan::find($id);
        $detailpenjualan->delete();
    }
}
