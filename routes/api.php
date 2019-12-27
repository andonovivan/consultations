<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete('/students/{id}', 'StudentsApiController@destroy')->name('students.destroy');
Route::delete('/professors/{id}', 'ProfessorsApiController@destroy')->name('professors.destroy');
Route::delete('/subjects/{id}', 'SubjectsApiController@destroy')->name('subjects.destroy');
