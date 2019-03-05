<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/ingreso', function () {
    return view('auth.login');
});

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

Route::group( ['middleware' => 'auth' ], function() {

    Route::get('/option', 'PageController@eleccion')->name('Elección');
    Route::get('/clinica', 'PageController@clinica')->name('clinica');

    Route::get('/images/{path}/{attachment}', function($path, $attachment) {
        $file = sprintf('storage/%s/%s', $path, $attachment);
        if(File::exists($file)) {
            return Image::make($file)->response();
        }
    });

    Route::resources([
        'client' => 'ClientController',
        'type' => 'TypeController',
        'cage' => 'CageController',
        'vaccine' => 'VaccineController',
        'schedule' => 'ScheduleController',
        'specialty' => 'SpecialtyController',
        'vet' => 'VetController',
        'exampet' => 'ExamPetController',
        'exam' => 'ExamController',
        'process' => 'ProcessController',
        'control' => 'ControlController',
        'breed' => 'BreedController',
        'pet' => 'PetController',

    ]);

    Route::get('/detail', 'ClientController@detail')->name('client.detail');
    Route::get('/control2/{id}', 'ControlController@create2')->name('control.create2');
    Route::get('/exampet2/{id}', 'ExamPetController@create2')->name('exampet.create2');
    Route::get('/moveleft/{id}', 'ExamPetController@moveleft')->name('exampet.moveleft');
    Route::get('/moveright/{id}', 'ExamPetController@moveright')->name('exampet.moveright');
    Route::get('pets/{id}', 'ScheduleController@getPets');
    Route::get('breeds/{id}', 'BreedController@getBreeds');
    Route::get('generate-pdf','TypeController@generatePDF');


    //Page system -- Pagina Web
    Route::get('/autoadm', 'PageController@autoadm')->name('autoadm');

    // Ruta Dashboard
    Route::get('/dash','PageController@dash')->name('dash');

    //Sistema de reserva de horas
    Route::get('/appoint', 'AppointmentController@calendar');
    Route::get('/appointments/calendar', 'AppointmentController@calendar')->name('appointments.calendar');
    Route::resource('appointments', 'AppointmentController');
});


//Paginas Publicas
Route::get('/', 'PageController@inicio')->name('index');
Route::get('/scheduled', 'PageController@schedule')->name('schedule');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contact', 'PageController@contact')->name('contact');


