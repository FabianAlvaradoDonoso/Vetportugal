<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::all();
        return view('pagesystem.Product.index', compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagesystem.Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $Product = new Product();
        if($request->hasFile('imagen'))
        {
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $Product->imagen = $name;
            $file->move(public_path().'/vetportugal/images/', $name);
        }

        $Product->name = $request->input('name');
        $Product->description = $request->input('description');
        $Product->resumen = $request->input('resumen');
        $Product->slug = time().$request->input('name');

        $Product->save();

        return redirect()->route('Product.index')->with('success', 'Creación Exitosa');
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
    public function edit(Product $Product)
    {
       
       return view('pagesystem.Product.edit', compact('Product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $Product)
    {
        $Product->fill($request->except('imagen'));
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/vetportugal/images', $name);
            $Product->imagen = $name;
        }

        $Product->save();
        return redirect()->route('Product.index')->with('success', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product)
    {
        $file_path = public_path().'/vetportugal/images/'.$Product->imagen;
        \File::delete($file_path);
        $Product->delete();

        return redirect()->route('Product.index')->with('success', 'Eliminación Exitosa');
    }
}