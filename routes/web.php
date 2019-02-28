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


Route::get('/clinica', function () {
    return view('auth.login');
});

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

Route::group( ['middleware' => 'auth' ], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/images/{path}/{attachment}', function($path, $attachment) {
        $file = sprintf('storage/%s/%s', $path, $attachment);
        if(File::exists($file)) {
            return Image::make($file)->response();
        }
    });

    Route::resource('client', 'ClientController');
    Route::get('/detail', 'ClientController@detail')->name('client.detail');
    Route::resource('type', 'TypeController');
    Route::resource('cage', 'CageController');
    Route::resource('vaccine', 'VaccineController');
    Route::resource('schedule', 'ScheduleController');
    Route::resource('specialty', 'SpecialtyController');
    Route::resource('vet', 'VetController');
    Route::resource('exampet', 'ExamPetController');
    Route::resource('exam', 'ExamController');
    Route::resource('process', 'ProcessController');
    Route::resource('control', 'ControlController');

    Route::get('/control2/{id}', 'ControlController@create2')->name('control.create2');
    Route::get('/moveleft/{id}', 'ExamPetController@moveleft')->name('exampet.moveleft');
    Route::get('/moveright/{id}', 'ExamPetController@moveright')->name('exampet.moveright');

    Route::resource('breed', 'BreedController');
    Route::resource('pet', 'PetController');

    Route::get('pets/{id}', 'ScheduleController@getPets');

    Route::get('generate-pdf','TypeController@generatePDF');

});


//Page system -- Pagina Web


Route::get('/', 'PageController@inicio')->name('index');
Route::get('/scheduled', 'PageController@schedule')->name('schedule');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/autoadm', 'PageController@autoadm')->name('autoadm');

// Ruta Dashboard
Route::get('/dash','PageController@dash')->name('dash');



//Sistema de reserva de horas


Route::get('/appoint', 'AppointmentController@calendar');

Route::get('/appointments/calendar', 'AppointmentController@calendar')->name('appointments.calendar');

Route::resource('appointments', 'AppointmentController');


//Sistema AUTOADM

Route::resource('Docs', 'DocController');
Route::resource('Carousel', 'CarouselController');
