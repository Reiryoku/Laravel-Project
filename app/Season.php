<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{	
	public function tvshow()
    {
        return $belongsTo('App\TvShow');
    }	
}
