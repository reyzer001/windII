<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\JournalEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::with('entries')->latest()->get();
        return view('journal.index', compact('journals'));
    }

    public function create()
    {
        return view('journal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'journal_date' => 'required|date',
            'entries.*.account_id' => 'required|exists:chart_of_accounts,id',
            'entries.*.debit' => 'nullable|numeric',
            'entries.*.credit' => 'nullable|numeric',
        ]);

        $journal = Journal::create([
            'journal_number' => 'JRN-' . now()->format('YmdHis'),
            'journal_date' => $request->journal_date,
            'reference_number' => $request->reference_number,
            'description' => $request->description,
            'status' => 'draft',
            'created_by' => Auth::id(),
        ]);

        $totalDebit = $totalCredit = 0;

        foreach ($request->entries as $entry) {
            $totalDebit += $entry['debit'] ?? 0;
            $totalCredit += $entry['credit'] ?? 0;

            $journal->entries()->create($entry);
        }

        $journal->update([
            'total_debit' => $totalDebit,
            'total_credit' => $totalCredit,
        ]);

        return redirect()->route('journal.index')->with('success', 'Jurnal berhasil dibuat.');
    }

    public function approve(Request $request)
    {
        $journal = Journal::findOrFail($request->id);
        $journal->update([
            'status' => 'posted',
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Jurnal berhasil disetujui.');
    }
}
