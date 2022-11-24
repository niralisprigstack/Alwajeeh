<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
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
        // return "here";  
        $request->session()->regenerate();


        if ($request->has('rememberMe') != null && $request->has('rememberMe') == 'on'){
            setcookie('user_name',$request->input('user_name'),time()+60*60*24*100);
            setcookie('login_pass',$request->input('password'),time()+60*60*24*100);
            // return setcookie('user_name',$request->input('user_name'),time()+60*60*24*100);
         }
         else{
            unset($_COOKIE['user_name']);
            setcookie('user_name', '', time() - 3600, '/'); 
            // setcookie('user_name',$request->input('user_name'),100);
            unset($_COOKIE['login_pass']);
            setcookie('login_pass', '', time() - 3600, '/'); 
            // setcookie('login_pass',$request->input('password'),100);

         }

        return redirect()->intended(RouteServiceProvider::HOME);
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
    }
}
