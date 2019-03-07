<?php

namespace App\Http\Controllers;

use App\Vet;
use App\Date;
use App\Time;
use App\User;
use DateTime;
use App\Phone;
use App\State;
use App\Specialty;
use App\Appointment;
use Illuminate\Http\Request;
use Spatie\CalendarLinks\Link;
use App\DateTime as DatetimeModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function prueba(){
        $appts = DatetimeModel::with('time')->whereIn('id', $idsDateTimes)->get();
        dd($appts);
        return $appts;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        $aux = Appointment::with('vet', 'state', 'dateTimes')->get();

        $date = Date::findOrFail($aux[0]['dateTimes']->date_id)->date;
        $time = Time::findOrFail($aux[0]['dateTimes']->time_id)->time;
        $dateTime = new DateTime($date . " " . $time);
        $appointments = array();
        foreach ($aux as $key => $value) {
            $vet = $value['vet']['user_id'];
            $usr = User::where('id', $vet)->first();
            $appointments[$key]['title'] = 'Dr. ' . $usr['name'] . ' ' . $usr['last_name'];
            $appointments[$key]['id'] = $value['id'];
            $date = Date::findOrFail($value['dateTimes']->date_id)->date;
            $time = Time::findOrFail($value['dateTimes']->time_id)->time;
            $dateTime = new DateTime($date . " " . $time);
            $appointments[$key]['start'] = $dateTime->format('Y-m-d H:i:s');
            if($value['state']->state === 'disponible') {
                $appointments[$key]['color'] = '#cccc'; //tono gris
                $appointments[$key]['textColor'] = 'black';
            }
            elseif ($value['state']->state === 'reservado') {
                $appointments[$key]['color'] = '#17a2b8'; //Color institucional
                $appointments[$key]['textColor'] = 'white';
            }
            elseif ($value['state']->state === 'confirmado') {
                $appointments[$key]['color'] = 'green';
                $appointments[$key]['textColor'] = 'white';
            }
        }
        return view('calendario.appointments.calendar', compact('appointments', 'states'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vets = Vet::all();
        return view('calendario.appointments.create', compact('vets'));
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
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        $veterinary = Vet::findOrFail($appointment->veterinary_id);
        // return compact('appointment', 'veterinary');
        return view('calendario.appointments.show', compact('appointment', 'veterinary'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $data = Appointment::with('vet', 'state')->findOrFail($appointment->id);
        return $data;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        Appointment::findOrFail($appointment->id)->update($request->all());
        return back();
        // return $appointment;
        // return $request;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $res = Appointment::where('id', $appointment->id)->delete();
        return ['success' => true];

    }
    public function gestionHoras() {
        $vets = Vet::with('user')->get();
        $states = State::all();
        $veterinaries = array();
        foreach ($vets as $key => $vet) {
            $veterinaries[$key]['id'] = $vet->id;
            $veterinaries[$key]['name'] = $vet->user->name . ' ' . $vet->user->last_name;
        }
        return view('calendario.appointments.gestionHoras', compact('veterinaries', 'states'));
    }
    public function getApptsByVet($vet) {

        $appts = Appointment::with('dateTimes', 'state')->where('vet_id', $vet)->get();
        $events = array();
        foreach ($appts as $key => $appt) {
            $dateId = $appt->dateTimes->date_id;
            $timeId = $appt->dateTimes->time_id;
            $fecha = Date::findOrFail($dateId)->date;
            $hora = Time::findOrFail($timeId)->time;
            $events[$key]['id'] = $appt->id;
            $events[$key]['start'] = $fecha . ' ' . $hora;

            if($appt['state']->state === 'disponible') {
                $events[$key]['color'] = '#cccc'; //tono gris
                $events[$key]['textColor'] = 'black';
            }
            elseif ($appt['state']->state === 'reservado') {
                $events[$key]['color'] = '#17a2b8'; //Color institucional
                $events[$key]['textColor'] = 'white';
            }
            elseif ($appt['state']->state === 'confirmado') {
                $events[$key]['color'] = 'green';
                $events[$key]['textColor'] = 'white';
            }
        }
        //Definir roles de la vista !!!
        return $events;
    }
    public function addAppointmentsByVet($vet, $fecha, $hora) {

        $date_id = Date::firstOrCreate(['date' => $fecha])->where('date', $fecha)->first()->id;
        $time_id = Time::firstOrCreate(['time' => $hora])->where('time', $hora)->first()->id;
        $date_time_id = DatetimeModel::firstOrCreate(['date_id' => $date_id, 'time_id' => $time_id])->where('date_id', $date_id)->where('time_id', $time_id)->first()->id;
        $checking = Appointment::where("vet_id", $vet)->where("state_id", 3)->where("date_times_id", $date_time_id)->get();
        if(empty($checking)) {
            return 201;
        }
        else {
            Appointment::create(["vet_id" => $vet, "state_id" => 3, "date_times_id" => $date_time_id]);
            return 200;
        }
    }
    public function arrayAppointments(Request $request) {
        foreach ($request->fechas as $key => $fecha) {
            $this->addAppointmentsByVet($request->vet, $fecha, $request->time);
        }
        return 'logrado';
    }
    public function gestionVets() {
        $vets = Vet::with('user')->get();
        return view('calendario.appointments.gestionVets', compact('vets'));
    }
    public function getspecialties() {
        return Specialty::all();
    }
    // public function getFechasByVet($vet) {

    //     $idsFechas = array();
    //     $idsHoras = array();
    //     $idsFechasHoras = array();
    //     $idsDatetimesAppts = array();
    //     $fechas = array();
    //     $fechas_ids = array();

    //     // Fecha actual
    //     $hoy = new DateTime();
    //     $hoy->setTime(0,0,0);
    //     $idHoy = Date::where('date', $hoy->format('Y-m-d'))->first()->id;
    //     //Encontrar todas las fechas mayores

    //     $cantidadFechas = Date::count();
    //     for ($i=0; $i < $cantidadFechas; $i++) {
    //         $fecha = new DateTime(Date::all()[$i]->date);
    //         if($hoy < $fecha) {
    //             array_push($idsFechas, Date::all()[$i]->id);
    //         }
    //     } //Fechas posibles
    //     $cantidadHoras = Time::count();
    //     $hoy = new DateTime();
    //     $hoy->modify('-3 hours'); // OJO CON EL CAMBIO DE HORA
    //     $hoy->modify('+10 minutes'); // OJO CON EL CAMBIO DE HORA
    //     for ($i=0; $i < $cantidadHoras; $i++) {
    //         $fecha = new DateTime($hoy->format('Y-m-d') . ' ' . Time::all()[$i]->time);
    //         if($hoy <= $fecha)
    //             array_push($idsHoras, Time::all()[$i]->id);
    //     } //Horas posibles (solo aplicables al día)
    //     $cantidadFechasHoras = DatetimeModel::count();
    //     for ($i=0; $i < $cantidadFechasHoras; $i++) {
    //         if(DatetimeModel::all()[$i]->date_id === $idHoy && in_array(DatetimeModel::all()[$i]->time_id, $idsHoras))
    //             array_push($idsFechasHoras, DatetimeModel::all()[$i]->id);

    //         else
    //             if(in_array(DatetimeModel::all()[$i]->date_id, $idsFechas))
    //                 array_push($idsFechasHoras, DatetimeModel::all()[$i]->id);
    //     } //FechasHoras posibles
    //     $cantidadAppts = Appointment::count();
    //     for ($i=0; $i < $cantidadAppts; $i++) {
    //         if(Appointment::all()[$i]->veterinary_id === $vet)
    //             array_push($idsDatetimesAppts, Appointment::all()[$i]->date_times_id);
    //     }
    //     $idsFechasHoras = array_diff($idsFechasHoras, $idsDatetimesAppts);
    //     for ($i=0; $i < count($idsFechasHoras); $i++) {
    //         array_push($fechas_ids, DatetimeModel::with('date')->where('id', $idsFechasHoras[$i])->first()->date->id);
    //     }
    //     $fechas_ids = array_values(array_unique($fechas_ids));
    //     sort($fechas_ids);
    //     for ($i=0; $i < count($fechas_ids); $i++) {
    //         array_push($fechas, Date::where('id', $fechas_ids[$i])->first()->date);
    //     }
    //     return $fechas;
    // }   DIGNA DE UN DISPARO AL DIEGO
    public function getVetByEsp($esp) {
        return Vet::with('user')->get();
        // OJO!
    }
    public function getHorasByVetFecha($fecha, $vet) {
        // $horas = 'Hola';
        $idFecha = Date::where('date', $fecha)->first()->id;
        $idsDateTimes = array();
        $horas = array();
        $horasaux = array();
        $appts = Appointment::with('dateTimes')->where('vet_id', $vet)->where('state_id', 3)->get();
        foreach ($appts as $key => $appt) {
            if($appt->dateTimes->date_id == $idFecha)
                array_push($idsDateTimes, $appt->date_times_id);
        }
        $datetimes = DatetimeModel::with('time')->whereIn('id', $idsDateTimes)->get();

        foreach ($datetimes as $key => $datetime) {
            array_push($horas, $datetime->time->time);
        }
        sort($horas);
        return $horas;
        // return $idFecha;
    }
    public function getVetPhoneNumber($vet) {
        $phone_id = Vet::where('id', $vet)->first()->phone_id;
        return Phone::where('id', $phone_id)->first()->mobile_phone;
    }
    public function takeAppointment($fecha, $hora, $vet, Request $request) {
        $time_id = Time::where('time', $hora)->first()->id;
        $date_id = Date::where('date', $fecha)->first()->id;
        $date_time_id = DatetimeModel::where('time_id', $time_id)->where('date_id', $date_id)->first()->id;
        Appointment::where('date_times_id', $date_time_id)->where('vet_id', $vet)->update($request->except(['_token']));
        return 'logrado';
    }
}
