<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    protected $fillable = [
        'street',
        'postal_code',
        'city',
        'country',
    ];

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }

    public function agencies(): HasMany
    {
        return $this->hasMany(Agency::class);
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
