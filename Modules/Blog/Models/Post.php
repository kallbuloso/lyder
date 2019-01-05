<?php

namespace Modules\Blog\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["author_id","title","slug",'url'];
    protected $dates = ['published_at'];

    public function category()
    {       
        return $this->belongsTo(Category::class);
    }
    
    public function tags()
    {       
        return $this->belongsToMany(Tag::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getDateAttribute($value)
    {       
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function scopeLatestFirst($query)
    {       
        return $query->orderBy('published_at', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }
    
}
