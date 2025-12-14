<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    protected $fillable = [
        'property_id',
        'agent_id',
        'client_name',
        'client_email',
        'client_phone',
        'scheduled_at',
        'ended_at',
        'status',
        'notes',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    public const RELATIONS = ['property', 'agent'];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
