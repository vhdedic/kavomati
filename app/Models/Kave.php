<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kave extends Model
{
    protected $table = 'kave';
	public $timestamps = false;
	
	public function kavomat()
	{
		return $this->belongsToMany('App\Models\Kavomat', 'kave_u_kavomatima', 'kava_id', 'kavomat_id');
	}
	
}
