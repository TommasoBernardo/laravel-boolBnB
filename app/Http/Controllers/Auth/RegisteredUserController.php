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
        $request->validate(
            [
                'name' => ['string', 'min:3', 'nullable', 'max:255'],
                'surname' => ['string', 'min:3', 'nullable', 'max:150'],
                'date_of_birth' => ['date', 'nullable'],
                'email' => ['required', 'string', 'email', 'min:8', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
                'name.string' => 'Si accettano solo lettere',
                'name.min' => 'Inserire minimo 3 caratteri ',
                'name.max' => 'Inserire massimo 255 caratteri',
                'surname.string' => 'Si accettano solo lettere',
                'surname.min' => 'Inserire minimo 3 caratteri ',
                'surname.max' => 'Inserire massimo 150 caratteri',
                'date_of_birth.date' => 'Inserire una data valida',
                'email.required' => 'Email obbligatorio',
                'email.email' => 'Inserire un email valida',
                'email.unique' => 'Email gia presente',
                'email.min' => 'Inserire minimo 8 caratteri',
                'email.max' => 'Inserire massimo 255 caratteri',
                'password.required' => 'Password obbligatoria',
                'password.confirmed' => 'Password diversa'

            ]

        );

        $user = User::create([
            'name' => $request->name,
            'surname' =>  $request->surname,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
