<?php

namespace App\Http\Controllers;

use App\Models\MatchWatching;
use App\Http\Requests\StoreMatchWatchingRequest;
use App\Http\Requests\UpdateMatchWatchingRequest;

class MatchWatchingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $MatchWatching = MatchWatching::get();
        return $this->response(code: 200, data: $MatchWatching);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatchWatchingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MatchWatching $matchWatching)
    {
        $id = $matchWatching->id;
        $matchWatching = MatchWatching::with('users', 'matches')->find($id);
        return $this->response(code: 200, data: $matchWatching);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MatchWatching $matchWatching)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatchWatchingRequest $request, MatchWatching $matchWatching)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MatchWatching $matchWatching)
    {
        //
    }
    public function delete(MatchWatching $matchWatching)
    {
        $delete = $matchWatching->delete();
        return $this->response(code: 202, data: $delete);
    }
    public function deleted(MatchWatching $matchWatching)
    {
        $deleted = $matchWatching->onlyTrashed()->get();
        return $this->response(code: 302, data: $deleted);
    }
    public function restore( $matchWatching)
    {
        $matchWatching = MatchWatching::withTrashed()->where('id', $matchWatching)->restore();
        return $this->response(code: 202, data: $matchWatching);
    }
    public function delete_from_trash( $matchWatching)
    {
        $matchWatching  = MatchWatching::where('id', $matchWatching)->forceDelete();
        return $this->response(code: 202, data: $matchWatching);
    }
}