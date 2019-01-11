<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [];
        
    public function getRouteKeyName()
    {
        return 'name';
    }
        
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
