<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lease extends Model
{
    protected $fillable = [
        'property_id',
        'tenant_id',
        'start_date',
        'end_date',
        'rent_amount',
        'charges_amount',
        'deposit_amount',
        'payment_due_day',
        'payment_method',
        'status',
        'notes',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'rent_amount' => 'decimal:2',
        'charges_amount' => 'decimal:2',
        'deposit_amount' => 'decimal:2',
        'payment_due_day' => 'integer',
    ];
    
    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    protected $enums = [
        'status' => [
            'draft' => 'Brouillon',
            'active' => 'Actif',
            'terminated' => 'Résilié',
            'cancelled' => 'Annulé',
        ],
        'payment_method' => [
            'bank_transfer' => 'Virement bancaire',
            'check' => 'Chèque',
            'cash' => 'Espèces',
            'direct_debit' => 'Prélèvement automatique',
        ],
    ];

    protected $with = ['property', 'tenant', 'payments'];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get the human-readable values for enums
     *
     * @param string $enum
     * @return array
     */
    public static function getEnumOptions(string $enum): array
    {
        return [
            'status' => [
                'draft' => 'Brouillon',
                'active' => 'Actif',
                'terminated' => 'Résilié',
                'cancelled' => 'Annulé',
            ],
            'payment_method' => [
                'bank_transfer' => 'Virement bancaire',
                'check' => 'Chèque',
                'cash' => 'Espèces',
                'direct_debit' => 'Prélèvement automatique',
            ],
        ][$enum] ?? [];
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function latestPayment(): HasOne
    {
        return $this->hasOne(Payment::class)->latestOfMany();
    }
}
