<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->fill($request->all())->save();
        return $user;
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all())->save();

        return response()->json([
            'user' => $user,
            'message' => 'Success'
          ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
    }
}