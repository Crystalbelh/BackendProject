<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;


class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

       $user = User::create([
    'name' => $this->name,
    'email' => $this->email,
    'password' => bcrypt($this->password),
]);

// Assign default role "user"
$user->assignRole('user');

// Log them in immediately if needed
Auth::login($user);
        return redirect()->route('home'); // adjust to your homepage route
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}