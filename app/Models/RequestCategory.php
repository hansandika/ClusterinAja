<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestCategory extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'status', 'request_category_id'];

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
