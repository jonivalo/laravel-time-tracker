<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Time Tracker</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-gray-900 dark:text-white">
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <header class="bg-white shadow dark:bg-gray-800">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Time Tracker
                </h1>
                <nav class="flex gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-900 dark:text-white hover:underline">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-900 dark:text-white hover:underline">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-gray-900 dark:text-white hover:underline">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>
        </header>

        <main class="flex flex-1 flex-col items-center justify-center">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-8 w-full max-w-4xl">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    Welcome to the Time Tracker Application
                </h2>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    Easily track your work hours and manage your projects efficiently.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Track Time</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Start and stop timers for different tasks and projects to keep accurate records of your work hours.
                        </p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Manage Projects</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Create and manage projects, assign tasks, and monitor progress easily.
                        </p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Generate Reports</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Generate detailed reports to analyze your work patterns and productivity.
                        </p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Collaborate</h3>
                        <p class="text-gray-700 dark:text-gray-300">
                            Collaborate with team members, assign tasks, and share progress in real-time.
                        </p>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-white dark:bg-gray-800 py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-700 dark:text-gray-300">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </footer>
    </div>
</body>
</html>
