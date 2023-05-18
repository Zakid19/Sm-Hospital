<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return response()->json([
        //     'message' => 'Anda harus login !'
        // ], 200);

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::check()) {
            if (Auth::user()->role_id == '1') {
                return redirect()->intended(RouteServiceProvider::ADMINHOME);
            } elseif (Auth::user()->role_id == '2') {
                return redirect()->intended(RouteServiceProvider::DOCTORHOME);
            }
            else {
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }

        //* Api
        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('myapptoken')->plainTextToken;

        return Response::json([
            'message' => 'Login Succes',
            'token' => $token,
            'token_type' => 'Bearer'
        ], 200);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

        Auth::user()->tokens()->delete();

        return Response::json([
            'message' => 'Logout Success'
        ]);

    }
}
