<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function process_login(Request $request)
    {
        try {
            $user = User::query()
                ->where('email', $request->get('email'))
                ->firstOrFail();

            if (!Hash::check($request->get('password'), $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('avatar', $user->avatar);
            session()->put('level', $user->level);

            return redirect()->route('courses.index');
            
        } catch (\Throwable $e) {
            return redirect()->route('login')->with('error', 'Đăng nhập thất bại');
        }
    }

    public function logout()
    {

        session()->flush();

        return redirect()->route('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function process_register(Request $request)
    {
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'level' => 0
        ]);

        return redirect()->route('login');
    }
}
