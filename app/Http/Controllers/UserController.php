<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }

    public function show(User $user)
    {
        return response()->json(['user' => $user], 200);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json(['user' => $user], 201);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json(['user' => $user], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
