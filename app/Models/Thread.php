<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'slug', 'description', 'cluster_id', 'thread_category_id', 'thread_image'];
    protected $with = ['threadCategory', 'user', 'comments'];

    public function getImageAttribute()
    {
        return asset('storage/threads/' . $this->thread_image);
    }

    public function threadCategory()
    {
        return $this->belongsTo(ThreadCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
