<?php

namespace App\Http\Controllers;

use App\Models\Asrama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AsramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Asrama::paginate('5');
        return view('dataasrama',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahasrama');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Asrama::create($request->all());
        return Redirect()->route('dataasrama');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function show(Asrama $asrama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function edit(Asrama $asrama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asrama $asrama)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asrama $asrama)
    {
        //
    }
}
