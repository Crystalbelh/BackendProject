{{-- If your happiness depends on money, you will never be happy with yourself. --}}
{{-- <x-layouts.app> --}}
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-6 text-indigo-700">🔑 Login</h2>

    <form wire:submit.prevent="login" class="space-y-4">
        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" wire:model="email" required autofocus
                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-400">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" wire:model="password" required
                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-400">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input type="checkbox" wire:model="remember" class="mr-2">
            <span class="text-sm">Remember Meee</span>
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full bg-gradient-to-r from-indigo-600 to-purple-700 text-white py-2 rounded-lg hover:opacity-90">
            Login
        </button>

        <p class="text-center text-sm mt-4">
            Don’t have an account? 
            <a href="{{ route('register') }}" class="text-indigo-600 font-medium">Register</a>
        </p>
    </form>
</div>

{{-- </x-layouts.app> --}}

