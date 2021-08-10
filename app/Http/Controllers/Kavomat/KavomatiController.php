<?php

namespace App\Http\Controllers\Kavomat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kavomat;
use App\Models\Lokacije;
use App\Models\Kave;

class KavomatiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$kavomati = Kavomat::orderBy('id')->get();
		return view('kavomati.index', ['kavomati' => $kavomati]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$lokacije = Lokacije::orderBy('grad')->get();
        return view('kavomati.create', ['lokacije' => $lokacije]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kavomat = new Kavomat();
		
		$input = $request->only('naziv', 'adresa');
		
		$kavomat->naziv = $input['naziv'];
		$kavomat->lokacija_id = $input['adresa'];
		$kavomat->save();
		
		return redirect()->route('kavomati.index')->withFlashMessage('Uspješno ste dodali novi kavomat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kavomati = Kavomat::find($id);
		$kave = Kave::orderBy('naziv')->get();
		return view('kavomati.show', ['kave' => $kave, 'kavomati' => $kavomati]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$kavomat = Kavomat::find($id);
        $lokacije = Lokacije::orderBy('grad')->get();
        return view('kavomati.edit', ['lokacije' => $lokacije, 'kavomat' => $kavomat ]);
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
        $kavomat = Kavomat::find($id);
		//$naziv = $kavomat->naziv;
		
		if($request->has('naziv')) {
			
			$input = $request->only('naziv', 'adresa');
			$kavomat->naziv = $input['naziv'];
			$kavomat->lokacija_id = $input['adresa'];
			$kavomat->save();
			
			return redirect()->route('kavomati.index')->withFlashMessage('Uspješno se uredili ' . $kavomat->naziv . ' kavomat!');
			
		} else {
			
			$input = $request->only('adresa');
			$kavomat->lokacija_id = $input['adresa'];
			$kavomat->save();
			
			return redirect()->route('kavomati.index')->withFlashMessage('Uspješno se uredili ' . $kavomat->naziv . ' kavomat!');
			
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
        $kavomat = Kavomat::find($id);
		$kavomat->delete();
		
		return redirect()->route('kavomati.index')->withFlashMessage('Uspješno se izbrisali ' . $kavomat->naziv . ' kavomat!');
    }
}
