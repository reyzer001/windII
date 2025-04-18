<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Jurnal Umum
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('journal.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Input Jurnal Manual</a>
            </div>

            <div class="bg-white p-6 rounded shadow">
                <p class="text-gray-700">Tampilkan daftar jurnal umum di sini</p>
                <!-- Tabel atau daftar jurnal -->
            </div>
        </div>
    </div>
</x-app-layout>
