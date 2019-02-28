<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCarouselRequest;
use App\Carousel;


class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Carousels = Carousel::all();
        return view('pagesystem/Carousel.index', compact('Carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagesystem/Carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarouselRequest $request)
    {
        $Carousels = new Carousel();
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/vetportugal/images/', $name);
          
        }
        
        $Carousels->imagen = $name; 
        $Carousels->subtitle = $request->input('subtitle');
        $Carousels->name = $request->input('name');
        $Carousels->active = $request->input('subtitle');
        $Carousels->btntitle = $request->input('btntitle');
        $Carousels->slug = time().$request->input('name');
        $Carousels->linkbtn = $request->input('linkbtn');
        $Carousels->save();

        $Carousels = Carousel::all();
        return view('/pagesystem/Carousel.index', compact('Carousels'));

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
    public function edit(Carousel $Carousel)
    {
        return view('pagesystem.Carousel.edit', compact('Carousel'));         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $Carousel)
    {
        $Carousel->fill($request->except('imagen'));       
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $Carousel->image = $name;
            $file->move(public_path().'/vetportugal/images/', $name);
        }
        $Carousel->save();
        return redirect()->route('Carousel.index')->with('success','Actualización exitosa.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $Carousel)
    {
        $file_path = public_path().'/vetportugal/images/'.$Carousel->image;
        \File::delete($file_path);
        $Carousel->delete();
        return redirect()->route('Carousel.index')->with('success','Eliminación exitosa.');
        
    }
}
