<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    protected $fillable = [
        'agency_id',
        'owner_id',
        'address_id',
        'reference',
        'title',
        'type',
        'property_type',
        'surface_area',
        'land',
        'rooms',
        'bedrooms',
        'floor',
        'floor_count',
        'construction_year',
        'heating_type',
        'energy_class',
        'ges',
        'furnished',
        'rent_amount',
        'price',
        'charges',
        'property_tax',
        'status',
        'description',
    ];

    protected $casts = [
        'surface' => 'float',
        'land' => 'float',
        'rooms' => 'integer',
        'bedrooms' => 'integer',
        'floor' => 'integer',
        'floor_count' => 'integer',
        'construction_year' => 'integer',
        'furnished' => 'boolean',
        'rent_amount' => 'decimal:2',
        'charges' => 'decimal:2',
        'property_tax' => 'decimal:2',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'construction_year',
    ];

    protected $with = ['agency', 'owner', 'address'];

    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function leases(): HasMany
    {
        return $this->hasMany(Lease::class);
    }

    public function activeLease(): HasOne
    {
        return $this->hasOne(Lease::class)->where('status', 'actif');
    }

    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
