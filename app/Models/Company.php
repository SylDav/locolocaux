<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'contact_id',
        'address_id',
        'name',
        'siret',
        'vat_number',
        'logo',
    ];
    
    protected $casts = [
        'siret' => 'string',
        'vat_number' => 'string',
    ];

    protected $with = ['contact', 'address'];

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function agencies(): HasMany
    {
        return $this->hasMany(Agency::class);
    }
}
