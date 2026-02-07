<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'mobile_number',
        'interest',
        'message',
        'ip_addr',
        'platform',
        'last_email_sent',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'last_email_sent' => 'datetime',
    ];

    /**
     * Validation rules for the model.
     *
     * @var array
     */
    public static $rules = [
        'full_name' => 'required|string|min:3|max:100',
        'email' => 'required|string|email|max:100|not_in:no-reply@sidequestph.com',
        'mobile_number' => 'required|string|max:20',
        'interest' => 'required|string|max:30',
        'message' => 'nullable|string',
        'ip_addr' => 'required|string|max:45',
        'platform' => 'required|string|max:50',
    ];
}
