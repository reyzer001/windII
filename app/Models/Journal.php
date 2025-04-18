<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'journal_number',
        'journal_date',
        'reference_number',
        'description',
        'total_debit',
        'total_credit',
        'status',
        'created_by',
        'approved_by',
        'approved_at',
    ];

    protected $casts = [
        'journal_date' => 'date',
        'approved_at' => 'datetime',
        'total_debit' => 'decimal:2',
        'total_credit' => 'decimal:2',
    ];

    // Relasi ke journal_entries
    public function entries()
    {
        return $this->hasMany(JournalEntry::class);
    }

    // Relasi ke user yang membuat jurnal
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relasi ke user yang menyetujui jurnal
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
