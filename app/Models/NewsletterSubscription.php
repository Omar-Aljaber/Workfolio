<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'is_active'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeReadyForSending($query)
    {
        return $query->active();
    }
}