<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['url', 'post_id'];
    // protected $guarded = [];
}
