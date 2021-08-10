<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokacije extends Model
{
    protected $table = 'lokacije';
	public $timestamps = false;
	
	public function kavomati()
    {
        return $this->hasMany('App\Models\Kavomat', 'lokacija_id');
    }
}
