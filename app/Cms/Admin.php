<?php

namespace Cms;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [ 'user_id' ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function profile()
    {
    	return $this->user();
    }
}
