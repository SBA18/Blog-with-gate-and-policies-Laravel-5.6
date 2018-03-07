<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    protected $fillable = [
        'uuid', 'title'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
