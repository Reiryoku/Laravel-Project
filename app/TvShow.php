<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tvshow extends Model
{	
	public function seasons()
    {
        return $this->hasMany('App\Season');
    }
	
}
