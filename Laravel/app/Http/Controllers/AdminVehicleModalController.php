<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle_company;
use App\Vehicle_modal;

class AdminVehicleModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $vehicle_companies = Vehicle_company::pluck('vehicle_company', 'id')->all();

      $vehicle_modals = Vehicle_modal::all();

      return view('admin.vehicle_modal.index', compact('vehicle_companies', 'vehicle_modals'));

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
        $input = $request->all();

        Vehicle_modal::create($input);

        return back()->with('added', 'Vehicle modal added');
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
        $vehicle_modal = Vehicle_modal::findOrFail($id);

        $input = $request->all();

        $vehicle_modal->update($input);

        return back()->with('updated', 'Vehicle modal updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle_modal = Vehicle_modal::findOrFail($id);

        $vehicle_modal->delete();

        return back()->with('deleted', 'Vehicle modal deleted');
    }
}
