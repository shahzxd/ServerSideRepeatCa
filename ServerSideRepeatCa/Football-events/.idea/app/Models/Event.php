<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'match_date',
        'location',
        'image',
        'capacity',
        'is_approved',
        'user_id',
        'longitude',
        'latitude'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($event) {
            $event->slug = Str::slug($event->title);
        });
        static::updating(function ($event) {
            $event->slug = Str::slug($event->title);
        });
    }
}
