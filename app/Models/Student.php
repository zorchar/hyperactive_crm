<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'national_id',
        'phone',
        'address',
        'curriculum',
        'starting_date'
    ];
}
