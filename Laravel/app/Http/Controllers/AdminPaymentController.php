<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment_user;
use App\Washing_price;
use App\Payment_mode;

class AdminPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $payments = Appointment_user::all();
      $washing_prices = Washing_price::all();
      $payment_mode_lists = Payment_mode::pluck('mode', 'id')->all();

      return view('admin.payment.index', compact('payments', 'washing_prices', 'payment_mode_lists'));
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
        $payment = Appointment_user::findOrFail($id);

        $input = $request->all();

        $payment->update($input);

        return back()->with('updated', 'Payment Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Appointment_user::findOrFail($id);

        $payment->delete();

        return back()->with('deleted', 'Payment Has Been Deleted');
    }
}
