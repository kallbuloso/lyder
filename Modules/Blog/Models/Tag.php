<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [];

            
    public function getRouteKeyName()
    {
        return 'name';
    }
        
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

}
