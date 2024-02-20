<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incentive extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'days',
    ];

    public function employee()
    {
        return $this->belongsToMany(Employee::class)->withTimestamps();
    }
}
