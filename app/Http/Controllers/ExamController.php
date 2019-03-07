<?php

namespace App\Http\Controllers;

use App\Exam;
use Auth;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::all();
        return view('vetsystem.exam.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vetsystem.exam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre'       => 'required',
            'caracteristicas'   => 'required',
            'vistas'   => 'required',
            'tipo'   => 'required',
        ]);

        $exam = new Exam;
        $exam->name = $request->nombre;
        $exam->characteristics = $request->caracteristicas;
        $exam->views = $request->vistas;
        $exam->type = $request->tipo;
        $exam->save();

        return redirect()->route('exam.index')->with('success','Examen Creado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        dd(Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return view('vetsystem.exam.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre'       => 'required',
            'caracteristicas'   => 'required',
            'vistas'   => 'required',
            'tipo'   => 'required',
        ]);

        $exam = Exam::find($id);
        $exam->name = $request->nombre;
        $exam->characteristics = $request->caracteristicas;
        $exam->views = $request->vistas;
        $exam->type = $request->tipo;
        $exam->save();

        return redirect()->route('exam.index')->with('success','Examen Modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id)->delete();
        return redirect()->route('exam.index')->with('success','Examen Eliminado con éxito');
    }
}
