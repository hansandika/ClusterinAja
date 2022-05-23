<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $with = ['cluster'];
    protected $fillable = [
        'email',
        'password',
        'profile_image',
        'dob',
        'biography',
        'cluster_id'
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

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function isAdmin()
    {
        return $this->email == "admin@admin.com";
    }
}
