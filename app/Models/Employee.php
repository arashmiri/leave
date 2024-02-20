<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vacations(): HasMany
    {
        return $this->hasMany(Vacation::class);
    }

    public function incentives()
    {
        return $this->belongsToMany(Incentive::class)->withTimestamps();
    }
}
