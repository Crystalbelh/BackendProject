<x-layouts.app>
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-purple-700">📝 Register</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" required autofocus
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-400">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-400">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-400">
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-purple-400">
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="w-full bg-gradient-to-r from-purple-600 to-pink-700 text-white py-2 rounded-lg hover:opacity-90">
                Register
            </button>

            <p class="text-center text-sm mt-4">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-purple-600 font-medium">Login</a>
            </p>
        </form>
    </div>
</x-layouts.app>
