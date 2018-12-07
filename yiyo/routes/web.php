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

//入口網站
route::get('/', function(){
    return view('entry.entry');
});

/* Authentication */

route::middleware('prelogin')->group(function () {
    route::get('vips/login', function () {
        return view('vips.login');
    });
    route::get('call-centers/login', function () {
        return view('call-centers.login');
    });
    route::get('medicals/login', function () {
        return view('medicals.login');
    });
    route::get('vips/register', function () {
        return view('vips.register');
    });
});

route::get('logout', 'AuthController@logout');

route::post('call-centers/login', 'AuthController@callCenterLogin');
route::post('medicals/login', 'AuthController@medicalLogin');
route::post('vips/login', 'AuthController@vipLogin');

route::middleware('auth')->group(function () {
    route::middleware('vip.identify')->group(function () {
        route::get('vips/index', function () {
            return view('vips.index');
        });


    });

    route::middleware('medical.identify')->group(function () {
        route::get('medicals/index', function () {
            return view('medicals.index');
        });
    });

    route::get('/calendar', function(){
        return view('work-time.calendar');
    });

    route::get('/opentok', function(){
        return view('.opentok.opentok');
    });

    route::get('/profile/medical', function(){
        return view('medicals/dnsinput');
    });

    route::get('/profile/vip', function(){
        return view('vips/vipinput');
    });


    route::get('/calllist', function(){
        return view('layouts.calllist');
    });

    route::middleware('call-center.identify')->group(function () {
        route::get('call-centers/index', function(){
            return view('call-centers.missionCenter');
        });
    });

    route::get('/client', function(){
        return view('opentok.client');
    });

    Route::get('login', 'MedicalsController@logion');

    route::prefix('call-centers')->group(function () {
        Route::get('consultation', 'HomeController@consultation');
        Route::get('executor', 'HomeController@executor');
        Route::get('register', 'HomeController@register');
        Route::get('status', 'HomeController@status');
        Route::get('visit', 'HomeController@visit');
    });

    Route::get('opentok', 'HomeController@opentok');
    route::get('/doctor', function(){
        return view('layouts.doctor');
    });
    route::prefix('missions')->group(function () {
        Route::get('handle', 'MissionsController@handleMissionList');
        Route::get('concern', 'MissionsController@concernMissionList');
    });
    route::get('getMissions', 'MissionsController@getMissions');
    route::get('missions/childId', 'MissionsController@getChildId');
    route::get('missions/status', 'MissionsController@status');
    route::get('missions/allmissions', 'MissionsController@getMission');
    route::get('missions/doctors', 'MissionsController@toDoctor');
    route::post('missions/sub', 'MissionsController@subMission');
    route::get('missions/executor/{id}', 'MissionsController@executor');
    route::get('medical/dnss', 'TypeController@getMedicalsByType');
    route::get('dnss', 'MedicalsController@getDoctorInfo');
    route::get('hospitals/get-hospitals-by-region', 'RegionsController@getHospitalsByRegion');
    Route::get('divisions/doctors-not-Emergency', 'MedicalsController@doctorsNotEmergency');
    Route::get('divisions/div', 'DivisionsController@index');
    Route::get('hospitals/getHospitals', 'HospitalsController@getHospitals');
    Route::get('hospitals/getPastHospital', 'UsersController@getHistoriesByUser');
    Route::get('hospitals/findHospital', 'HospitalsController@findHospital');
    route::post('missions/complete', 'MissionsController@complete');
    route::post('missions/message', 'MessagesController@createMessage');
});
Route::put('missions/{id}', 'MissionsController@update');
route::resource('divisions', 'DivisionsController');
route::resource('hospitals', 'HospitalsController');
route::resource('medicals', 'MedicalsController');
route::resource('messages', 'MessagesController');
route::resource('missions', 'MissionsController');
route::resource('regions', 'RegionsController');
route::resource('users', 'UsersController');
route::resource('vips', 'VIPsController');
route::resource('worktimes', 'WorkTimesController');
route::resource('calls', 'CallController');
route::resource('cities', 'CitiesController');
Route::resource('progresses', 'ProgressesController');

// 醫師 app
// route::get('missions/doctorMission/{id}', 'MissionsController@doctorMission');

// // VIP app
// route::get('missions/vipMission/{id}', 'MissionsController@vipMission');

// // VIP get mission 
// route::get('progresses/mission/{id}', 'ProgressesController@getProgressByMissionID');   