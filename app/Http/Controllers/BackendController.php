<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ShowBeheer()
    {
        return view('backend/beheer');
    }

Route::get('/beheer/play', 'BackendController@ShowPlay');
Route::get('/beheer/play/add', 'BackendController@ShowPlayAdd');
Route::get('/beheer/play/{id}', 'BackendController@ShowPlayEdit');

Route::get('/beheer/performance', 'BackendController@ShowPerformance');
Route::get('/beheer/performance/add', 'BackendController@ShowPerformanceAdd');
Route::get('/beheer/performance/{id}', 'BackendController@ShowPerformanceEdit');

Route::get('/beheer/page', 'BackendController@ShowPage');
Route::get('/beheer/page/{id}', 'BackendController@ShowPageEdit');

Route::get('/beheer/reservation', 'BackendController@ShowReservation');
Route::get('/beheer/reservation/add', 'BackendController@ShowPerformanceAdd');
Route::get('/beheer/reservation/performance/{performance_id}', 'BackendController@ShowPerformanceReservation');
Route::get('/beheer/reservation/edit/{reservation_id}', 'BackendController@ShowReservationEdit');

Route::get('/beheer/log', 'BackendController@ShowLog');

}
