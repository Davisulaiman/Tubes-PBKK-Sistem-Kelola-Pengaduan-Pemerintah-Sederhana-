<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

<style>
    /* Global Styles */
    body {
        font-family: 'Figtree', sans-serif;
        background-color: #f5f5f5;
        color: #333;
    }

    /* Login Container */
    .login-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    /* Login Card */
    .login-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 400px;
    }

    /* Logo */
    .login-logo {
        display: block;
        margin: 0 auto 24px;
        max-width: 80px;
    }

    /* Heading */
    .login-heading {
        font-size: 24px;
        font-weight: 600;
        text-align: center;
        margin-bottom: 16px;
        color: #1E429F;
    }

    /* Form */
    .login-form {
        margin-top: 24px;
    }

    .login-form .form-group {
        margin-bottom: 16px;
    }

    .login-form label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 8px;
        color: #1E429F;
    }

    .login-form input {
        width: 100%;
        padding: 12px 16px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: border-color 0.3s ease;
    }

    .login-form input:focus {
        outline: none;
        border-color: #1E429F;
    }

    /* Buttons */
    .login-form .btn {
        display: block;
        width: 100%;
        padding: 12px 16px;
        font-size: 16px;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .login-form .btn-primary {
        background-color: #1E429F;
        color: #fff;
    }

    .login-form .btn-primary:hover {
        background-color: #143282;
    }

    .login-form .btn-link {
        background-color: transparent;
        color: #1E429F;
        margin-top: 16px;
    }

    .login-form .btn-link:hover {
        color: #143282;
    }

    /* Additional Styles */
    .login-card p {
        font-size: 14px;
        color: #6c757d;
        text-align: center;
        margin-top: 16px;
    }

    .login-card p a {
        color: #1E429F;
        text-decoration: none;
        transition: color 0.3s ease;
    }
</style>
