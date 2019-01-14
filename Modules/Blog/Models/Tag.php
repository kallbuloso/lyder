<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'url'];
    // protected $guarded = [];

            
    public function getRouteKeyName()
    {
        return 'url';
    }
        
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    
    public function setNameAttribute($name)
    {
        $this->attibutes['name'] = $name;
        $this->attibutes['url'] = str_slug($name);
    }

}
