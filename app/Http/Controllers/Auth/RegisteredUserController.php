<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'account_type' => ['required', 'in:candidate,company' ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

      
       $role = $request->input('account_type');
       
       

        $user = User::create([
           
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'password' => Hash::make($request->password),
        ]);

        

        event(new Registered($user));

        Auth::login($user);

        if(auth()->user()->role === 'company'){
            return redirect(RouteServiceProvider::COMPANY);

        }else if(auth()->user()->role === 'candidate'){
            return redirect(RouteServiceProvider::CANDIDATE);

        }else{
            return redirect()->back();
        }

       
    }
}
