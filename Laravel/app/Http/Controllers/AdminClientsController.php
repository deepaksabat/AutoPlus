<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;

class AdminClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::all();

        return view('admin.clients.index', compact('clients'));
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
        $request->validate([
          'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $input = $request->all();

        $file = $request->file('image');

        $name = time() . $file->getClientOriginalName();

        $file->move('images/clients', $name);

        $input['image'] = $name;

        Clients::create($input);

        return back()->with('added', 'Client has been added');
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
        $request->validate([
          'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $client = Clients::findOrFail($id);

        $input = $request->all();

        $file = $request->file('image');

        $name = time() . $file->getClientOriginalName();

        unlink(public_path() . '/images/clients/' . $client->image);

        $input['image'] = $name;

        $client->update($input);

        return back()->with('updated', 'Client has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Clients::findOrFail($id);

        unlink(public_path() . '/images/clients/' . $client->image);

        $client->delete();

        return back()->with('deleted', 'Client has been Deleted');
    }
}
