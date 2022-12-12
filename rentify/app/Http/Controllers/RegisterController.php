<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    public function showTenant()
    {
        return view('auth.register-tenant');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        $user = User::create($request->validated());

        if($user->rl==1){
            $user->syncRoles('landlord');
        }  
        if($user->rl==2){
            $user->syncRoles('tenant');
        }

        auth()->login($user);

        return redirect('/dashboard')->with('success', "Account successfully registered.");
    }
}