<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['url', 'name'];
    // protected $guarded = [];
        
    public function getRouteKeyName()
    {
        return 'url';
    }
        
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function setNameAttribute($name)
    {
        $this->attibutes['name'] = $name;
        $this->attibutes['url'] = str_slug($name);
    }
}
