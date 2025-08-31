{{-- Close your eyes. Count to one. That is how long forever feels. --}}
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-500 to-indigo-600">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">Create an Account</h2>

        <!-- Livewire Form -->
        <form wire:submit.prevent="register">
            <!-- Name -->
            <div class="mb-4">
                <label class="block text-sm mb-1">Name</label>
                <input type="text" wire:model.defer="name"
                       class="w-full px-4 py-2 rounded-lg border focus:ring focus:ring-purple-400" required>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-sm mb-1">Email</label>
                <input type="email" wire:model.defer="email"
                       class="w-full px-4 py-2 rounded-lg border focus:ring focus:ring-purple-400" required>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-sm mb-1">Password</label>
                <input type="password" wire:model.defer="password"
                       class="w-full px-4 py-2 rounded-lg border focus:ring focus:ring-purple-400" required>
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label class="block text-sm mb-1">Confirm Password</label>
                <input type="password" wire:model.defer="password_confirmation"
                       class="w-full px-4 py-2 rounded-lg border focus:ring focus:ring-purple-400" required>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-purple-500 to-indigo-600 text-white py-2 rounded-lg shadow hover:opacity-90 transition">
                Register
            </button>
        </form>

        <p class="text-sm text-center mt-4">
            Already have an account?
            <a href="{{ route('login') }}" class="text-purple-600 font-semibold">Login</a>
        </p>
    </div>
</div>
