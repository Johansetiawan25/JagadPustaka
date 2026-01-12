<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-600 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-gray-700 mb-6">
            Daftar Jagad Pustaka
        </h1>

        <img src="{{ asset('storage/img/logo.jpeg') }}"
            class="mx-auto mt-4 w-24 mb-6"
            alt="Logo">

        @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring"
                    required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring"
                    required>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring"
                    required>
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-6">
                <label class="block text-gray-600 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring"
                    required>
            </div>

            <!-- Link Login -->
            <div class="text-center text-sm text-gray-600 mb-4">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-indigo-600 font-medium">
                    Masuk di sini
                </a>
            </div>

            <!-- Button Daftar -->
            <button type="submit"
                class="w-full bg-indigo-500 hover:bg-fuchsia-500 text-white py-2 rounded-lg transition">
                Daftar Sekarang
            </button>
        </form>
    </div>
</body>

</html>
