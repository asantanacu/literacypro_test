<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\BandRequest as Request;
use App\Band;
use JWTAuth;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;

class BandController extends Controller
{
    use Helpers;
    
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
        return $request->user()->bands()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //create band
        if($request->user()->bands()->create($request->all()))
            return $this->response->created();
        else
            return $this->response->error('could_not_create_band', 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Band $band)
    {
        return $band;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Band $band, Request $request)
    {
        $band->fill($request->all());
        if($band->save())
            return $this->response->noContent();
        else
            return $this->response->error('could_not_update_band', 500);
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
        if($band->delete())
            return $this->response->noContent();
        else
            return $this->response->error('could_not_delete_band', 500);
    }    
}

