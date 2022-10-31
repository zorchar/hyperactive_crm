<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'students_attendances';

    public function scopeFilter($query, $id)
    {
        if ($id ?? false) {
            $query->where('user_id', 'like', $id);
        }
    }

    protected $fillable = [
        'user_id',
        'created_by',
        'approved_by',
        'approved_time_of_entry'
    ];
}
