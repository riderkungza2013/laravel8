<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Location::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        //ONLY CREATE -> https://laravel.com/docs/8.x/eloquent#mass-assignment
        // $location = Location::create($requestData);
        //CREATE OR UPDATE -> https://laravel.com/docs/8.x/eloquent#upserts
        $user_id = $requestData["user_id"];
        $item = Location::updateOrCreate(['user_id' => $user_id], $requestData);
        return ["success" => true, "data" => $item];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Location::findOrFail($id);
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
        $requestData = $request->all();
        $item = Location::findOrFail($id);
        $success = $item->update($requestData);
        return ["success" => $success];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Location::findOrFail($id);
        $success = $item->delete();
        return ["success" => $success];
    }
}
