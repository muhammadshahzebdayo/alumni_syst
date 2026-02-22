<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'event_id',
    ];

    // Relationship: News belongs to Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
