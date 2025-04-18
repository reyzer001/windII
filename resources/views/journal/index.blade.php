<x-app-layout>
    <x-slot name="header">Jurnal Umum</x-slot>

    <div class="mb-4">
        <a href="{{ route('journal.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Jurnal Baru</a>
    </div>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th>No Jurnal</th>
                <th>Tanggal</th>
                <th>Total Debit</th>
                <th>Total Kredit</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($journals as $journal)
                <tr>
                    <td>{{ $journal->journal_number }}</td>
                    <td>{{ $journal->journal_date }}</td>
                    <td>{{ number_format($journal->total_debit, 2) }}</td>
                    <td>{{ number_format($journal->total_credit, 2) }}</td>
                    <td>{{ ucfirst($journal->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
