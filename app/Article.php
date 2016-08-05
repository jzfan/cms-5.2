<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'summary', 'source', 'provider', 'page_img', 'content'];

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }
}
