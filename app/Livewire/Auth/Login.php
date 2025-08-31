<?php

namespace App\Livewire\Auth;

use App\Services\CartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
   public $email;
    public $password;

    // public function login()
    // {
    //     $this->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
    //         session()->regenerate();
    //         return redirect()->route('home');
    //     }

    //     session()->flash('error', 'Invalid email or password.');
    // }
    
    // public function render()
    // {
    //     return view('livewire.auth.login');
    // }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->hasRole(['Admin', 'SuperAdmin'])) {
            return redirect()->route('dashboard'); // admin area
        }

        return redirect()->route('home'); // customers always to home
    }

    return back()->withErrors([
        'email' => 'Invalid credentials provided.',
    ]);
}
}
