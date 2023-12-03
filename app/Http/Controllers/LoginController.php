<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function toLogin() {
        
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // return response()->json([
            //     'message' => 'Login success',
            //     'api_token' => $user->createToken($request->device_name)->plainTextToken
            // ]);
            return $user->createToken($request->email)->plainTextToken;
        }

        return response()->json([
            'message' => 'Login failed'
        ]);
        
        // return back()->with('loginError','Login failed!');
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout success'
        ]);
    }

    // public function login(Request $request) {
    //     $request->validate([
    //         'email' => 'required|email:dns',
    //         'password' => 'required'
    //     ]);
    // }
}
