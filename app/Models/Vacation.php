<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function Personnel(): BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }
}
