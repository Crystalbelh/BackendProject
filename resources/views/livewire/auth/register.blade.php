{{-- Close your eyes. Count to one. That is how long forever feels. --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-500 to-indigo-600">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">Create an Account</h2>
        <form method="POST" action="{{ url('/register') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm mb-1">Name</label>
                <input type="text" name="name" class="w-full px-4 py-2 rounded-lg border focus:ring focus:ring-purple-400" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm mb-1">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 rounded-lg border focus:ring focus:ring-purple-400" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm mb-1">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 rounded-lg border focus:ring focus:ring-purple-400" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 rounded-lg border focus:ring focus:ring-purple-400" required>
            </div>
            <button class="w-full bg-gradient-to-r from-purple-500 to-indigo-600 text-[blue] py-2 rounded-lg shadow hover:opacity-90 transition">
                Register
            </button>
        </form>
        <p class="text-sm text-center mt-4">Already have an account? 
            <a href="{{ url('/login') }}" class="text-purple-600 font-semibold">Login</a>
        </p>
    </div>
</body>
</html>

