<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'slug', 'category_id', 'body', 'status'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
