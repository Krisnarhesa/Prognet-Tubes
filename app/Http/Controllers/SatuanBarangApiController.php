<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\satuanbarang;

class SatuanBarangApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return satuanbarang::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $satuanbarang = new satuanbarang();
        $satuanbarang->fill($request->all())->save();

        return response()->json([
            'user' => $satuanbarang,
            'message' => 'Success'
          ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return satuanbarang::find($id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $satuanbarang = satuanbarang::find($id);
        $satuanbarang->fill($request->all())->save();
        return $satuanbarang;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $satuanbarang = satuanbarang::find($id);
        $satuanbarang->delete();
    }
}
