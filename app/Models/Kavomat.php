<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kavomat extends Model
{
    protected $table = 'kavomati';
	public $timestamps = false;
	
	public function lokacija()
	{
		return $this->belongsTo('App\Models\Lokacije');
	}
	
	public function kava()
	{
		return $this->belongsToMany('App\Models\Kave', 'kave_u_kavomatima', 'kavomat_id', 'kava_id');
	}
	
}
