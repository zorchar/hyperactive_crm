<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Status extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function scopeFilter($query, $id)
    {
        if ($id ?? false) {
            $query->where('user_id', 'like', $id);
        }
    }

    protected $fillable = [
        'description',
        'user_id',
        'created_at',
        'creator'
    ];
}
