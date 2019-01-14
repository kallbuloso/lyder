<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    // protected $fillable = ['url', 'post_id'];
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($photo){
            $photoPath = str_replace('storage', 'public', $photo->url);
            Storage::delete($photoPath);
        });
    }
}
