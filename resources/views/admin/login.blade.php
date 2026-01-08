<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-600 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-gray-700 mb-6">
            Login JagadPustaka
        </h1>
        <h5 class="text-lg font-bold text-center text-gray-700 mb-6">
            
        </h5>

        <img src="{{ asset('images/Logoamikom.png') }}"
            class="mx-auto mt-4 w-24 mb-3"
            alt="Login Image">

        @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 rounded">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Email</label>
                <input type="email" name="email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring"
                    required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-600 mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring"
                    required>
            </div>

            <div class="text-center text-sm text-gray-600 mt-4 mb-4">
                Belum punya akun?
                <a href="" class="text-indigo-600 font-medium">
                    Daftar
                </a>
            </div>


            <button
                class="w-full bg-indigo-500 hover:bg-fuchsia-500 text-white py-2 rounded-lg transition">
                Login
            </button>
        </form>
    </div>

</body>

</html>