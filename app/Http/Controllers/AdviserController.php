<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdviserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @description Login functionality for adviser
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email','password']);
        if (!Auth::attempt($credentials)) {
            return redirect()->to('/')
                ->withErrors(['filed' => trans('auth.failed')]);
        }

        return redirect()->route('dashboard');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @description Logout functionality for adviser
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
