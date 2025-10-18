<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $data = $request->validate([
                "email" => "required|email",
                "password" => "required|string"
            ]);

            if (!Auth::attempt($data)) {
                return response()->json([
                    "message" => "Email atau password salah"
                ], 422);
            };

            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                "message" => "Berhasil login",
                "token" => $token
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                "message" => "Validasi Error",
                "errors" => $e->errors()
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Gagal login",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
