<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => true]);

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {
    
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/zodiac-signs', 'ZodiacController@zodiacSigns')->name('zodiac-signs');
Route::get('/zodiac-calendar', 'ZodiacController@zodiacCalendar')->name('zodiac-calendar');
Route::post('/get-zodiac-calender-score', 'ZodiacController@getZodiacCalenderScore')->name('get-zodiac-calender-score');
Route::post('/get-zodiac-month-year-score', 'ZodiacController@getZodiacMonthYearScore')->name('get-zodiac-month-year-score');
Route::get('/zodiac-month-analysis', 'ZodiacController@zodiacMonthlyAnalysis')->name('zodiac-month-analysis');
Route::get('/zodiac-year-analysis', 'ZodiacController@zodiacYearlyAnalysis')->name('zodiac-year-analysis');
Route::get('/yearly-zodiac-analysis', 'ZodiacController@zodiacYearlyAnalysisReport')->name('yearly-zodiac-analysis');

});