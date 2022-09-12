<?php

namespace App\Http\Controllers;

use Debugbar;
use ErrorException;
use App\Models\LevelTwo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use League\Uri\Contracts\QueryInterface;

class LevelTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            // $level_twos = LevelTwo::with(['allCarts.cart_opens' => function ($query) {
            //     $query->orderBy('id', 'desc');
            // }])->withCount('cart_opens')->orderBy('cart_opens_count', 'desc')->get();

             $level_twos = LevelTwo::withCount('cart_opens')->orderBy('cart_opens_count', 'desc')->get();

            return response()->json(['level_twos' => $level_twos], 200);
        } catch(\Throwable $th) {
            return response()->json(['err' => $th->getMessage()], 500);
        }

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
     * @param  \App\Models\LevelTwo  $levelTwo
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        try{

            $level_twos = LevelTwo::withCount('cart_opens')
                ->orderBy('cart_opens_count', 'desc')
                ->where('level_one_id', $id)
                ->get();

            return response()->json(['level_twos' => $level_twos], 200);
        } catch(\Throwable $th) {
            return response()->json(['err' => $th->getMessage()], 500);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LevelTwo  $levelTwo
     * @return \Illuminate\Http\Response
     */
    public function edit(LevelTwo $levelTwo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LevelTwo  $levelTwo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LevelTwo $levelTwo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LevelTwo  $levelTwo
     * @return \Illuminate\Http\Response
     */
    public function destroy(LevelTwo $levelTwo)
    {
        //
    }
}