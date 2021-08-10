<?php

namespace App\Http\Controllers\Kave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kave;
use App\Models\Kavomat;

class KaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kave = Kave::orderBy('id')->get();
		return view('kave.index', ['kave' => $kave]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kave = Kave::orderBy('naziv')->get();
        return view('kave.create', ['kave' => $kave]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kava = new Kave();
		
		$input = $request->only('naziv', 'cijena');
		
		$kava->naziv = $input['naziv'];
		$kava->cijena = $input['cijena'];
		$kava->save();
		
		return redirect()->route('kave.index')->withFlashMessage('Uspješno ste dodali novu kavu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kave = Kave::find($id);
		$kavomati = Kavomat::orderBy('naziv')->get();
		return view('kave.show', ['kave' => $kave, 'kavomati' => $kavomati]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kave = Kave::find($id);
        return view('kave.edit', ['kave' => $kave ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kave = Kave::find($id);
		
		if($request->has('cijena')) {
			
			$input = $request->only('cijena');
			$kave->cijena = $input['cijena'];
			$kave->save();
			
			return redirect()->route('kave.index')->withFlashMessage('Uspješno se uredili ' . $kave->naziv . ' kavu!');
			
		} 
    }
    
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kava = Kave::find($id);
		$kava->delete();
		
		return redirect()->route('kave.index')->withFlashMessage('Uspješno se izbrisali kavu ' . $kava->naziv . '!');
    }
}
