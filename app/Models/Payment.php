<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'lease_id',
        'amount',
        'paid_at',
        'status',
        'method',
        'reference',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'date',
    ];

    protected $with = ['lease'];

    public function lease(): BelongsTo
    {
        return $this->belongsTo(Lease::class);
    }
}
