<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyDay extends Model
{
    use HasFactory;

    protected $table = 'students_weekly_study_days';

    public function scopeFilter($query, $id)
    {
        if ($id ?? false) {
            $query->where('user_id', 'like', $id);
        }
    }

    protected $fillable = [
        'user_id',
        'day_of_week',
        'start_time',
        'end_time',
        'is_remote'
    ];

    // Relationship To User -- find out why is it neccecery
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
