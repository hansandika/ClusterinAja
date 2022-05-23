<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'user_id', 'description', 'request_category_id', 'request_image', 'status'];
    protected $with = ['requestCategory', 'user'];

    public function requestCategory()
    {
        return $this->belongsTo(RequestCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
