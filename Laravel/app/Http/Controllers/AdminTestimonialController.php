<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class AdminTestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
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

        if ($file = $request->file('image')) {

          $name = time() . $file->getClientOriginalName();

          $file->move('images/testimonial', $name);

          $input['image'] = $name;

        }

        Testimonial::create($input);

        return back()->with('added', 'Testimonial has been added');
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

        $input = $request->all();

        $testimonial = Testimonial::findOrFail($id);

        if ($file = $request->file('image')) {

          $name = time() . $file->getClientOriginalName();

          $file->move('images/testimonial', $name);

          unlink(public_path() . "/images/testimonial/" . $testimonial->image);

          $input['image'] = $name;

        }

        $testimonial->update($input);

        return back()->with('updated', 'Testimonial has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->image) {

          unlink(public_path() . "/images/testimonial/" . $testimonial->image);

        }

        $testimonial->delete();

        return back()->with('deleted', 'Testimonial has been deleted');
    }
}
