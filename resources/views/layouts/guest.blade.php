<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                font-family: 'Inter', sans-serif;
                background-color: #f5f7fa;
            }
            input {
                border: 1px solid #e2e8f0;
                border-radius: 0.5rem;
                padding: 0.5rem 1rem;
                transition: all 0.2s;
            }
            input:focus {
                outline: none;
                border-color: #3b82f6;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
            }
            button[type="submit"] {
                background-color: #3b82f6;
                color: white;
                font-weight: 500;
                border-radius: 0.5rem;
                padding: 0.5rem 1rem;
                transition: all 0.2s;
            }
            button[type="submit"]:hover {
                background-color: #2563eb;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-b from-blue-50 to-gray-100">
            <div class="mb-4">
                <a href="/" class="text-3xl font-bold text-blue-600">WIND</a>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-8 py-8 bg-white shadow-xl rounded-xl border border-gray-100">
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} Wind. All rights reserved.
            </div>
        </div>
    </body>
</html>
