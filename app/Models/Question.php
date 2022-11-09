<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'students_questions';

    public function scopeFilter($query, $id)
    {
        if ($id ?? false) {
            // $query->where('student_id', 'like', $id);
            $query->where('student_id', 'like', $id);
        }
    }

    protected $fillable = [
        'student_id',
        'question',
        'teacher_remark',
        'updated_by'
    ];

    // Relationship To User -- find out why is it neccecery -- check Brad Traversy Tinker section
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
