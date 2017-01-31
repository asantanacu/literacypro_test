<?php

namespace App\Http\Controllers;

use App\Http\Requests\BandRequest as Request;
use App\Band;

class BandController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:access-band,band')->except('index','create','store');
    }    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // get all the bands
        $bands = $request->user()->bands()->sortable()->paginate(10);

        // load the view and pass the bands
        return view('bands.index', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('bands.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //create band
        $request->user()->bands()->create($request->all());
        //redirect
        return redirect()->route('band.index')->with('message', 'Successfully created band!');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Band $band)
    {
        // show the view and pass the band to it
        return view('bands.show', compact('band'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Band $band)
    {
        // show the edit form and pass the band
        return view('bands.edit', compact('band'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Band $band, Request $request)
    {
        // update band
        $band->fill($request->all())->save();
        // redirect
        return redirect()->route('band.index')->with('message', 'Successfully updated band!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Band $band)
    {
        // delete band
        $band->delete();
        // redirect
        return redirect()->back()->with('message', 'Successfully deleted the Band!');
    }
}
