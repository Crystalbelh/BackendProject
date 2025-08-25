<x-layouts.app-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-indigo-700">🔐 Forgot Password</h2>

        @if (session('status'))
            <p class="text-green-600 text-sm mb-4">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required autofocus
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-400">
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-700 text-white py-2 rounded-lg hover:opacity-90">
                Send Password Reset Link
            </button>
        </form>
    </div>
</x-layouts.app-layout>
