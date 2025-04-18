<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Input Jurnal Manual</h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto">
        <form method="POST" action="{{ route('journal.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" class="w-full rounded border-gray-300" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Keterangan</label>
                <input type="text" name="keterangan" class="w-full rounded border-gray-300" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Akun Debit</label>
                <input type="text" name="akun_debit" class="w-full rounded border-gray-300">
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Akun Kredit</label>
                <input type="text" name="akun_kredit" class="w-full rounded border-gray-300">
            </div>

            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Nominal</label>
                <input type="number" name="nominal" class="w-full rounded border-gray-300" required>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        </form>
    </div>
</x-app-layout>
