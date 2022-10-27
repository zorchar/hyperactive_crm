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
            $query->where('student_id', 'like', $id);
        }
    }

    protected $fillable = [
        'student_id',
        'question',
        'teacher_remark',
    ];
}
