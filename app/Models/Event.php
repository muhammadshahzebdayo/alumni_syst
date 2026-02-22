<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'description',
        'event_date',
        'location',
        'organizer',
    ];

    // Relationship: One Event has many News
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
