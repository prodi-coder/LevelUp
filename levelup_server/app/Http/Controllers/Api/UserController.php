<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getusers()
    {
        return response()->json(
            User::select(
                'id',
                'username',
                'role',
            )->get()
        );
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        $username = $request->username;
        $password = Hash::make($request->password);
        $role = $request->role;

        $create = User::create([
            "username" => $username,
            "password" => $password,
            "role" => $role
        ]);

        if ($create) {
            return response()->json([
                'message' => 'user created successfully.',
                'error' => 1,
            ]);
        } else {
            return response()->json([
                'message' => 'User creation encountered a problem.',
                'error' => 0,
            ]);
        }
    }
}
