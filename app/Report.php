<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['qq_or_phone', 'name', 'title', 'content', 'image'];
}
