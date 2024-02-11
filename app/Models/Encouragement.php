<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encouragement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'days',
    ];

    public function personnel()
    {
        return $this->belongsToMany(Personnel::class)->withTimestamps();
    }
}
