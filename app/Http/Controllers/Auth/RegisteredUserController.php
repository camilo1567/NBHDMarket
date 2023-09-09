<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSetting;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Spatie\Permission\Models\Role;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'rol' => 'required|integer|between:1,2'
        ]);

        $is_store = 0;
        $is_client = 0;

        if($request->rol == 1){

            $is_store = 1;

        }
        if($request->rol == 2){

            $is_client = 1;

        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_store' => $is_store,
            'is_client' => $is_client,
        ]);

        if($request->rol == 1){

            $user->assignRole('negocio');

        }

        if($request->rol == 2){

            $user->assignRole('cliente');

        }

        event(new Registered($user));

        UserSetting::create([
            'user_id' => $user->id,
        ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
