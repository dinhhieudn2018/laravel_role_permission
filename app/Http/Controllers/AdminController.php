<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('users.index');
        }
        return redirect()->route('admin.get.login');
    }

    public function logout() {
        if (Auth::guard('admin')) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.get.login');
        }
    }
}
