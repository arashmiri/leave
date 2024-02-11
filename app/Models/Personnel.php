<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Personnel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function vacations(): HasMany
    {
        return $this->hasMany(Vacation::class);
    }

    public function encouragements()
    {
        return $this->belongsToMany(Encouragement::class)->withTimestamps();
    }
}
