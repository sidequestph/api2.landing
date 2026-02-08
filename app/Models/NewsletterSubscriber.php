<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'newsletter_subscriber';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
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
        'email' => 'required|string|email|max:100|unique:newsletter_subscriber,email',
    ];
}
