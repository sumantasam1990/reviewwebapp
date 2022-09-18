<?php

namespace App\Http\Controllers;

use App\Models\LevelOne;
use Illuminate\Http\Request;

class LevelOneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $level_ones = LevelOne::select('one_title as title', 'id as oneId')->get();

        // return response()->json(['level_ones' => $level_ones], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LevelOne  $levelOne
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $level_ones = LevelOne::select('one_title as title', 'id as oneId')->where('main_category_id', $id)->get();

        return response()->json(['level_ones' => $level_ones], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LevelOne  $levelOne
     * @return \Illuminate\Http\Response
     */
    public function edit(LevelOne $levelOne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LevelOne  $levelOne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LevelOne $levelOne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LevelOne  $levelOne
     * @return \Illuminate\Http\Response
     */
    public function destroy(LevelOne $levelOne)
    {
        //
    }
}