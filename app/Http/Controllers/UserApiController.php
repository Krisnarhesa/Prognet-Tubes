<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;


class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return user::all();
    }

    public function update(Request $request, string $id)
    {
        $user = user::find($id);
        $user->fill($request->all())->save();
        return $user;
    }
    public function store(Request $request)
    {
        $user = new user();
        $user->fill($request->all())->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return user::find($id);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = user::find($id);
        $user->delete();
    }
}