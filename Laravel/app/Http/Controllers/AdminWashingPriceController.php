<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Washing_plan;
use App\Vehicle_type;
use App\Washing_price;

class AdminWashingPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $washing_plans = Washing_plan::pluck('name', 'id')->all();
        $vehicle_types = Vehicle_type::pluck('type', 'id')->all();
        $washing_prices = Washing_price::all();

        return view('admin.washing_price.index', compact('washing_plans', 'vehicle_types', 'washing_prices'));
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

        Washing_price::create($input);

        return back()->with('added', 'Pricing plan added');
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
        $washing_price = Washing_price::findOrFail($id);

        $input = $request->all();

        $washing_price->update($input);

        return back()->with('updated', 'Pricing plan updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $washing_price = Washing_price::findOrFail($id);

        $washing_price->delete();

        return back()->with('deleted', 'Pricing plan deleted');
    }
}
