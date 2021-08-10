<?php

namespace App\Http\Controllers\Lokacije;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lokacije;
use App\Models\Kavomat;

class LokacijeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokacije = Lokacije::orderBy('id')->get();
		return view('lokacije.index', ['lokacije' => $lokacije]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$lokacije = Lokacije::orderBy('grad')->get();
        return view('lokacije.create', [/*'lokacije' => $lokacije*/]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lokacija = new Lokacije();
		
		$input = $request->only('grad', 'adresa');
		
		$lokacija->grad = $input['grad'];
		$lokacija->adresa = $input['adresa'];
		$lokacija->save();
		
		return redirect()->route('lokacije.index')->withFlashMessage('Uspješno ste dodali novu lokaciju');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lokacije = Lokacije::find($id);
		$kavomati = Kavomat::orderBy('naziv')->get();
		return view('lokacije.show', ['kavomati' => $kavomati, 'lokacije' => $lokacije]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokacija = Lokacije::find($id);
		$lokacija->delete();
		
		return redirect()->route('lokacije.index')->withFlashMessage('Uspješno se izbrisali lokaciju' . $lokacija->naziv . '!');
    }
}
