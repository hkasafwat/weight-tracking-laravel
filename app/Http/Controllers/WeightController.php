<?php

namespace App\Http\Controllers;

use App\User;
use App\Weight;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user_weights = User::find(1)->weights;
        $user_weights = auth()->user()->weights;
        return $user_weights;
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
        try {
            $user = auth()->user();
            $weight = new Weight;

            $weight->user_id = $user->id;
            $weight->weight = $request->weight;
            $weight->inserted_at = $request->date_value;

            $weight->save();

            return 'done';
        }
        catch(\Exception $e){
        // do task when error
            echo $e->getMessage();

            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Weight  $Weight
     * @return \Illuminate\Http\Response
     */
    public function show(Weight $Weight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Weight  $Weight
     * @return \Illuminate\Http\Response
     */
    public function edit(Weight $Weight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Weight  $Weight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weight $Weight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Weight  $Weight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weight $Weight)
    {
        //
    }
}
