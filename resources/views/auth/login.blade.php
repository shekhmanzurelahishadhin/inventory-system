<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
<div class="w-full max-w-sm p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>

    @if (session('status'))
        <div class="mb-4 text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}"
                   class="w-full mt-1 px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                   required autofocus>
            @error('email')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" name="password" type="password"
                   class="w-full mt-1 px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                   required>
            @error('password')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mb-4">
            <label class="flex items-center text-sm">
                <input type="checkbox" name="remember" class="mr-2 rounded border-gray-300 text-indigo-600">
                Remember Me
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                    Forgot?
                </a>
            @endif
        </div>

        <!-- Submit -->
        <button type="submit"
                class="w-full py-2 px-4 bg-indigo-600 text-white text-sm font-semibold rounded hover:bg-indigo-700">
            Log in
        </button>
    </form>
</div>
</body>
</html>
