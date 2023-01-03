<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'url',
        // 'likes',
        // 'reports',
        'user_id',
        'category_id'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    // public function media()
    // {
    //     return $this->hasMany(Media::class);
    // }
}
