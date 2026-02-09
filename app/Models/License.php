<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class License extends Model
{
    protected $fillable = [
        'license_key',
        'client_name',
        'client_email',
        'activation_limit',
        'expires_at',
        'status',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'activation_limit' => 'integer',
    ];

    public function activations(): HasMany
    {
        return $this->hasMany(Activation::class);
    }

    /**
     * Check if license is active and not expired
     */
    public function isValid(): bool
    {
        if ($this->status !== 'active') {
            return false;
        }

        if ($this->expires_at && $this->expires_at->isPast()) {
            return false;
        }

        return true;
    }
}
