<?php

namespace App\Http\Controllers\Auth;

use App\Actions\AssignSubjects;
use App\Http\Controllers\Controller;
use App\Models\Lov;
use App\Models\Subject;
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
        $subjects = Subject::active()->pluck('name', 'id');
        $classes = Lov::where('lov_category_id', 1)->pluck('name', 'id');
        return view('auth.register', compact('subjects', 'classes'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'dob' => ['required'],
            'class' => ['required'],
            'qualifications' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'dob' => $request->dob,
            'class' => $request->class,
            'qualifications' => $request->qualifications,
            'password' => Hash::make($request->password),
        ]);

        AssignSubjects::run($user, $request->role, $request->subjects);

        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
