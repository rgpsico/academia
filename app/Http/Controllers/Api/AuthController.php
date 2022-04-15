<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $data = $request->only([
            'name',
            'password'

        ]);

        if (Auth::attempt($data)) {
            return auth()->user();
        }

        return response()->json(["data" => "Nome ou senha Errado"], 403);
    }
}
