@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="flex h-screen">
        <aside class="w-50 bg-white border-r border-gray-200 hidden md:block">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-indigo-600 tracking-tighter">JagadPustaka</h1>
            </div>

            <nav class="mt-6 px-6 space-y-2">
                <a href="{{ url('/') }}" class="block px-4 py-2.5 bg-indigo-50 text-indigo-700 rounded-lg font-medium">
                    Dashboard
                </a>
                <a href="{{ url('/transaksi/create') }}" class="block px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition">
                    Tambah Produk
                </a>
                <a href="{{ url('/laporan') }}" class="block px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition">
                    Laporan (VIP)
                </a>

                <a href="{{ url('/laporan') }}" class="block px-4 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition">
                    Logout
                </a>
            </nav>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-sm border-b border-gray-200 p-4 md:hidden">
                <h1 class="text-xl font-bold text-indigo-600">JagadPustaka</h1>
            </header>

            <div class="flex-1 overflow-auto p-4 md:p-8">
                @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r shadow-sm">
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>

@endsection