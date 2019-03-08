<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all()->first();
        return view('pagesystem.About.index', compact('about'));
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
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        // dd($about);
        return view('pagesystem.About.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'description' =>'required',
            'mission' => 'required',
            'vision' => 'required',
            'choose' => 'required',
        ]);

        $about = About::find($id);
        $about->description = $request->description;
        $about->mission = $request->mission;
        $about->vision = $request->vision;
        $about->choose = $request->choose;


        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();

            $file_path = public_path().'/vetportugal/images/'.$about->image;
            \File::delete($file_path);

            $about->image = $name;
            $file->move(public_path().'/vetportugal/images/', $name);
        }
        $about->save();
        return redirect()->route('Abouts.index')->with('success','Actualización exitosa.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
