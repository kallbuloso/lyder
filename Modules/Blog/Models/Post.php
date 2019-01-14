<?php

namespace Modules\Blog\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'excerpt', 'published_at', 'category_id',
    ];
    // protected $guarded = [];
    protected $dates = ['published_at'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post){
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }

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

    // public function getImageUrlAttribute($value)
    // {
    //     $imageUrl = "";
    //     if (! is_null($this->image))
    //     {
    //         $imagePath = public_path() . "/vendors/images/" . $this->image;
            
    //         if (file_exists($imagePath)) $imageUrl = asset("vendors/images/" . $this->image);
    //     }
    //     return $imageUrl;
    // }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        // $url = str_slug($title);
        // if (Post::where('url',$url)->exist())
        // {
        //     $url = $url . "-2";
        // }

        $this->attributes['url'] = str_slug($title);
        $this->attributes['author_id'] = Auth::id();
    }

    public function setPublishedAtAttribute($published_at)
    {
        $dat = $published_at;
        if (!$dat == null) {
            $dataT = implode('-', array_reverse(explode('/', $dat)));
            $dat = date('Y-m-d', strtotime($dataT));
            $dat = $dat. date(' H:i:s');                
        } else {            
            $dat = null;
        } 
        $this->attributes['published_at'] = $dat;
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
