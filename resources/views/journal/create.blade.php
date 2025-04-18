<x-app-layout>
    <x-slot name="header">Input Jurnal Umum</x-slot>

    <form action="{{ route('journal.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label>Tanggal Jurnal</label>
                <input type="date" name="journal_date" required class="w-full border rounded p-2">
            </div>
            <div>
                <label>Nomor Referensi</label>
                <input type="text" name="reference_number" class="w-full border rounded p-2">
            </div>
        </div>

        <div class="mt-4">
            <label>Deskripsi</label>
            <textarea name="description" class="w-full border rounded p-2"></textarea>
        </div>

        <div class="mt-4">
            <label>Detail Jurnal</label>
            <div id="entries">
                <div class="entry grid grid-cols-4 gap-2 mb-2">
                    <select name="entries[0][account_id]" class="border rounded p-2">
                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" step="0.01" name="entries[0][debit]" placeholder="Debit" class="border rounded p-2">
                    <input type="number" step="0.01" name="entries[0][credit]" placeholder="Kredit" class="border rounded p-2">
                    <input type="text" name="entries[0][description]" placeholder="Keterangan" class="border rounded p-2">
                </div>
            </div>
            <button type="button" onclick="addEntry()" class="mt-2 bg-green-500 text-white px-4 py-1 rounded">+ Baris</button>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Simpan</button>
        </div>
    </form>

    <script>
        let count = 1;
        function addEntry() {
            const container = document.getElementById('entries');
            const html = `
                <div class="entry grid grid-cols-4 gap-2 mb-2">
                    <select name="entries[${count}][account_id]" class="border rounded p-2">
                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                        @endforeach
                    </select>
                    <input type="number" step="0.01" name="entries[${count}][debit]" placeholder="Debit" class="border rounded p-2">
                    <input type="number" step="0.01" name="entries[${count}][credit]" placeholder="Kredit" class="border rounded p-2">
                    <input type="text" name="entries[${count}][description]" placeholder="Keterangan" class="border rounded p-2">
                </div>`;
            container.insertAdjacentHTML('beforeend', html);
            count++;
        }
    </script>
</x-app-layout>
