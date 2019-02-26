<?php

namespace App\Http\Controllers;

use App\ExamPet;
use Illuminate\Http\Request;
use App\Exam;
use App\User;

class ExamPetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examspets = ExamPet::with('pet', 'exam')->get();
        // dd($exams);
        return view('vetsystem.exampet.index', compact('examspets'));
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
     * @param  \App\ExamPet  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(ExamPet $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExamPet  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamPet $exampet)
    {
        $users = User::all();
        $exams = Exam::all();
        $exampet = ExamPet::with('pet.client.user')->find($exampet->id);
        // dd($exam);
        return view('vetsystem.exampet.edit', compact('exampet', 'users', 'exams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExamPet  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamPet $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExamPet  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = ExamPet::find($id)->delete();
        return redirect()->route('exampet.index')->with('success','Examen eliminado con éxito');
    }

    public function moveleft($id)
    {
        $exam = ExamPet::find($id);
        $status = $exam->status;

        if($status == 'RR'){
            $exam->status = 'MR';
            $exam->save();
            return redirect()->route('exampet.index')->with('success','Examen modificado con éxito');

        }elseif($status == 'RE'){
            $exam->status = 'RR';
            $exam->save();
            return redirect()->route('exampet.index')->with('success','Examen modificado con éxito');

        }elseif($status == 'HA'){
            $exam->status = 'RE';
            $exam->save();
            return redirect()->route('exampet.index')->with('success','Examen modificado con éxito');

        }else{
            $exam->save();
            return redirect()->route('exampet.index')->with('success','No se puede hacer un paso mas atras');
        }


    }
    public function moveright($id)
    {
        $exam = ExamPet::find($id);
        $status = $exam->status;

        if($status == 'MR'){
            $exam->status = 'RR';
            $exam->save();
            return redirect()->route('exampet.index')->with('success','Examen modificado con éxito');

        }elseif($status == 'RR'){
            $exam->status = 'RE';
            $exam->save();
            return redirect()->route('exampet.index')->with('success','Examen modificado con éxito');

        }elseif($status == 'RE'){
            $exam->status = 'HA';
            $exam->save();
            return redirect()->route('exampet.index')->with('success','Examen modificado con éxito');

        }else{
            $exam->save();
            return redirect()->route('exampet.index')->with('success','No se puede hacer un paso mas adelante');
        }
    }
}
