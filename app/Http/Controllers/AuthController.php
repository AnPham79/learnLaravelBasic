<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function process_login(Request $request)
    {
        try {
            $user = user::query()
                ->where('email', $request->get('email'))
                ->where('password', $request->get('password'))
                ->firstOrFail();

            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('avatar', $user->avatar);
            session()->put('level', $user->level);
        } catch (\Throwable $e) {

            return redirect()->route('login')->with('error', 'Đăng nhập thất bại');
        }
    }

    public function logout()
    {

        session()->flush();

        return redirect()->route('login');
    }
}
