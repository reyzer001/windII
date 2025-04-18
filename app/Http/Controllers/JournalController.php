<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index() {
        return view('journal.index');
    }

    public function create() {
        return view('journal.create');
    }

    public function store(Request $request) {
        // Validasi & simpan data jurnal manual
    }

    public function approve() {
        // Proses persetujuan jurnal (jika multi-level)
    }
}

?>