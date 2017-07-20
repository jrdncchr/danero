<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];
	
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getShortContentAttribute()
    {
        preg_match("/(?:\w+(?:\W+|$)){0,20}/", $this->content, $matches);
        return $matches[0] . "...";
    }

}
