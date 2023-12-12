<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\satuanbarang;

class BarangApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [barang::all(), satuanbarang::all()];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barang = new barang();
        $barang->fill($request->all())->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return barang::find($id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = barang::find($id);
        $barang->fill($request->all())->save();
        return $barang;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = barang::find($id);
        $barang->delete();
    }
}
