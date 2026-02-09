<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activation extends Model
{
    public $timestamps = false; // We manage created_at and last_checkin_at manually if needed, but schema has them.

    protected $fillable = [
        'license_id',
        'domain',
        'server_ip',
        'wp_version',
        'php_version',
        'last_checkin_at',
    ];

    protected $casts = [
        'last_checkin_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function license(): BelongsTo
    {
        return $this->belongsTo(License::class);
    }
}
