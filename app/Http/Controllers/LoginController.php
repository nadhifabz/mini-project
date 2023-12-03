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

    public function apiLogin(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        $response['token'] = $user->createToken('auth_token')->plainTextToken;
        $response['name'] = $user->name;
        $response['email'] = $user->email;

        if (Auth::attempt($credentials)) {
            // return $user->createToken($request->email)->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'Login success',
                'data' => $response
            ]);
        }

        return response()->json([
            'message' => 'Login failed'
        ]);
    }
    
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        
        return back()->with('loginError','Login failed!');
    }

    public function apiLogout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout success'
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
