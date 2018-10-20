<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
	protected $fillable = ['image', 'tags'];
    //
	public function tags() {
		return $this->belongsToMany('App\Tag');
	}
}
