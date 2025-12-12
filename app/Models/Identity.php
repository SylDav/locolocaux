<?php

namespace App\Models;

class Identity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lastname',
        'firstname',
        'gender',
        'birthdate',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birthdate' => 'date',
    ];

    /**
     * Get the user that owns the identity.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
