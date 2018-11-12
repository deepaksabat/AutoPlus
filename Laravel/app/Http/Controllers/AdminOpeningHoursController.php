<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opening_hour;

class AdminOpeningHoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timings = Opening_hour::all();

        return view('admin.opening_hours.index', compact('timings'));
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
        if ($request->opening_time == '' && $request->closing_time == '') {

          Opening_hour::create(['day'=>$request->day, 'opening_time'=>'-', 'closing_time'=>'-']);

          return back()->with('added', 'Opening Hours added');

        }

        $input = $request->all();

        Opening_hour::create($input);

        return back()->with('added', 'Opening Hours added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $time = Opening_hour::findOrFail($id);

        if ($request->opening_time == '' && $request->closing_time == '') {

          $time->update(['day'=>$request->day, 'opening_time'=>'-', 'closing_time'=>'-']);

           return back()->with('updated', 'Opening Hours added');

        }

        $input = $request->all();

        $time->update($input);

        return back()->with('updated', 'Opening hours Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time = Opening_hour::findOrFail($id);

        $time->delete();

        return back()->with('deleted', 'Opening hours deleted');
    }
}
