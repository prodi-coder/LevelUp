<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class StartController extends Controller
{
    public function start()
    {
        return response()->json(
            User::where("role", 1)->exists()
        );
    }

    public function createAdmin(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $username = $request->username;
        $password = Hash::make($request->password);
        $role = 1;

        User::create([
            "username" => $username,
            "password" => $password,
            "role" => $role,
        ]);

        return response()->json([
            'message' => 'Administrator created successfully.'
        ]);
    }
}
