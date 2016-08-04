<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }
}
