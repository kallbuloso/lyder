<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["author_id","title","slug",'url'];
    protected $dates = ['published_at'];
    
}
