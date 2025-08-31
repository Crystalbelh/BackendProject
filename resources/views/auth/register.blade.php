{{-- resources/views/auth/register.blade.php --}}
<x-layouts.app>
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-purple-700">📝 Register</h2>

        <!-- Show validation or auth errors -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-400 @error('name') border-red-500 @enderror">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-400 @error('email') border-red-500 @enderror">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-400 @error('password') border-red-500 @enderror">
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-400">
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="w-full bg-gradient-to-r from-purple-600 to-pink-700 text-white py-2 rounded-lg hover:opacity-90">
                Register Here
            </button>

            <!-- Login Redirect -->
            <p class="text-center text-sm mt-4">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-purple-600 font-medium hover:underline">Login</a>
            </p>
        </form>
    </div>
</x-layouts.app>
