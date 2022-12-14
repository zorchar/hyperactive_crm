<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'email',
        'password',
        'national_id',
        'phone',
        'address',
        'curriculum',
        'starting_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship With Statuses
    public function statuses()
    {
        return $this->hasMany(Status::class, 'user_id');
    }

    // Relationship With Study Days
    public function studyDays()
    {
        return $this->hasMany(StudyDay::class, 'user_id');
    }

    // Relationship With Questions
    public function questions()
    {
        return $this->hasMany(Question::class, 'user_id');
    }
}
