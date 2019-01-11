<?php

namespace Modules\Blog\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["author_id","title","slug",'url'];
    // protected $guarded = [];
    protected $dates = ['published_at'];

    public function category()
    {       
        return $this->belongsTo(Category::class);
    }
    
    public function tags()
    {       
        return $this->belongsToMany(Tag::class);
    }    
    
    public function photos()
    {       
        return $this->hasMany(Photo::class);
    }
    
    public function getRouteKeyName()
    {
        return 'url';
    }

    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
        if (! is_null($this->image))
        {
            $imagePath = public_path() . "/vendors/images/" . $this->image;
            
            if (file_exists($imagePath)) $imageUrl = asset("vendors/images/" . $this->image);
        }
        return $imageUrl;
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
