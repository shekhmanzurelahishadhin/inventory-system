<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex bg-gray-100 min-h-screen">

<!-- Sidebar -->
<aside class="w-64 bg-white shadow h-screen p-5">
    <h1 class="text-xl font-bold mb-6 text-indigo-600">Inventory System</h1>
    <nav class="space-y-3">
        <a href="{{ url('/products') }}"
           class="block px-3 py-2 rounded {{ request()->is('products*') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-gray-700 hover:bg-indigo-100' }}">
            Products
        </a>

        <a href="{{ url('/sales/index') }}"
           class="block px-3 py-2 rounded {{ request()->is('sales/index') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-gray-700 hover:bg-indigo-100' }}">
            Sale
        </a>

        <a href="{{ url('/reports') }}"
           class="block px-3 py-2 rounded {{ request()->is('reports*') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'text-gray-700 hover:bg-indigo-100' }}">
            Reports
        </a>
    </nav>
</aside>


<!-- Main Content Area -->
<div class="flex-1 flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow px-6 py-4 flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-800">Dashboard</h2>

        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-700">{{ Auth::user()->name ?? 'User' }}</span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-red-600 hover:underline">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <!-- Page Content -->
    <main class="flex-1 p-6">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

            @if(session('warning'))
                <div class="mb-4 p-4 bg-yellow-100 text-yellow-800 rounded">
                    {{ session('warning') }}
                </div>
            @endif
        @yield('content')
    </main>

</div>
</body>
</html>
