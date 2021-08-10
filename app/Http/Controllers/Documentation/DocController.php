<?php

namespace App\Http\Controllers\Documentation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kavomat;

class DocController extends Controller
{
    public function index()
	{
		$kavomati = Kavomat::all();
		return view('documentation', ['kavomati' => $kavomati]);
	}
}
