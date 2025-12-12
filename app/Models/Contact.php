<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    protected $fillable = [
        'phone',
        'email',
    ];

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }

    public function agencies(): HasMany
    {
        return $this->hasMany(Agency::class);
    }
}
