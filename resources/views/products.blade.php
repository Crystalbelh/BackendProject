<x-layouts.app>

@slot('content')
<div class="min-h-screen bg-gradient-to-r from-purple-600 to-indigo-700 text-white p-10">
  <h1 class="text-3xl font-bold mb-4">🛒 Products</h1>
  <p>Here you’ll be able to manage and browse products.</p>
  <a href="{{ route('dashboard') }}" class="mt-6 inline-block bg-white/20 px-4 py-2 rounded-lg hover:bg-white/30">
    ⬅ Back to Dashboard
  </a>
</div>
</x-layouts.app>