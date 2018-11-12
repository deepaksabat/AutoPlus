<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
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
          'logo' => 'image|mimes:jpeg,png,jpg',
          'logo_two' => 'image|mimes:jpeg,png,jpg',
        ]);

        $input = $request->all();

        $file = $request->file('logo');
        $file2 = $request->file('logo_two');

        $name = $file->getClientOriginalName();
        $name2 = $file2->getClientOriginalName();

        $file->move('images/logo', $name);
        $file2->move('images/logo', $name2);

        $input['logo'] = $name;
        $input['logo_two'] = $name2;

        Contact::create($input);

        return back()->with('added', 'Record Has Been Added');
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
          'logo' => 'image|mimes:jpeg,png,jpg',
          'logo_two' => 'image|mimes:jpeg,png,jpg',
        ]);

        $contact = Contact::findOrFail($id);

        $input = $request->all();

        if ($file = $request->file('logo')) {

          $name = $file->getClientOriginalName();

          unlink(public_path(). '/images/logo/' . $contact->logo);

          $file->move('images/logo', $name);

        }

        if ($file2 = $request->file('logo_two')) {

          $name2 = $file2->getClientOriginalName();

          unlink(public_path(). '/images/logo/' . $contact->logo_two);

          $file2->move('images/logo', $name2);

        }

        $input['logo'] = $name;
        $input['logo_two'] = $name2;

        $contact->update($input);

        return back()->with('updated', 'Record Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        unlink(public_path() . '/images/logo/' . $contact->logo);

        $contact->delete();

        return back()->with('deleted', 'Record Has Been Deleted');
    }
}
