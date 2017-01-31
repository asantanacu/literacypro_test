<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\AlbumRequest as Request;
use App\Album;
use JWTAuth;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    use Helpers;
    /**
    * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return $request->user()->albums()->paginate(6);
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
        if($band->albums()->create($request->all()))
            return $this->response->created();
        else
            return $this->response->error('could_not_create_album', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Album $album)
    {
        return $album;
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
        $album->fill($request->all());
        if($album->save())
            return $this->response->noContent();
        else
            return $this->response->error('could_not_update_book', 500);
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
        if($album->delete())
            return $this->response->noContent();
        else
            return $this->response->error('could_not_delete_album', 500);
    }    
}

