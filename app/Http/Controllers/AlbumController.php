<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest as Request;
use App\Album;

class AlbumController extends Controller
{
    /**
    * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:access-album,album')->except('index','create','store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // get all the albums
        $albums = $request->user()->albums()->filterBand(\Request::get('band_id'))->sortable()->paginate(10);
        //get all the bands
        $bands = $request->user()->bands()->pluck('name', 'id');

        // load the view and pass the albums
        return view('albums.index', compact('albums', 'bands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        //get all the bands
        $bands = $request->user()->bands()->pluck('name', 'id');
        return view('albums.edit', compact('bands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //find band
        $band = $request->user()->bands()->findOrFail($request->input('band_id'));
        //create album
        $band->albums()->create($request->all());
        //redirect
        return redirect()->route('album.index')->with('message', 'Successfully created album!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Album $album)
    {
        // show the view and pass the band to it
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Album $album, Request $request)
    {
        //get all the bands
        $bands = $request->user()->bands()->pluck('name', 'id');
        // show the edit form and pass the album
        return view('albums.edit', compact('album', 'bands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Album $album, Request $request)
    {
        //find band
        $band = $request->user()->bands()->findOrFail($request->input('band_id'));
        // update album
        $album->band_id = $band->id;
        $album->fill($request->all())->save();
        // redirect
        return redirect()->route('album.index')->with('message', 'Successfully updated album!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Album $album)
    {
        // delete album
        $album->delete();
        // redirect
        return redirect()->back()->with('message', 'Successfully deleted the Album!');
    }    
}

