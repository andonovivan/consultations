<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index')->name('home');

// Students
Route::get('/students', 'StudentsController@index')->name('students.index');
Route::get('/students/{id}/edit', 'StudentsController@edit')->name('students.edit');
Route::get('/students/create', 'StudentsController@create')->name('students.create');
Route::post('/students', 'StudentsController@store')->name('students.store');
Route::post('/students/{id}/update', 'StudentsController@update')->name('students.update');
Route::delete('/students/{id}', 'StudentsController@destroy')->name('students.destroy');
// End Students

// Professors
Route::get('/professors', 'ProfessorsController@index')->name('professors.index');
Route::get('/professors/{id}/edit', 'ProfessorsController@edit')->name('professors.edit');
Route::get('/professors/create', 'ProfessorsController@create')->name('professors.create');
Route::post('/professors', 'ProfessorsController@store')->name('professors.store');
Route::post('/professors/{id}/update', 'ProfessorsController@update')->name('professors.update');
Route::delete('/professors/{id}', 'ProfessorsController@destroy')->name('professors.destroy');
// End Professors

// Subjects
Route::get('/subjects', 'SubjectsController@index')->name('subjects.index');
Route::get('/subjects/{id}/edit', 'SubjectsController@edit')->name('subjects.edit');
Route::get('/subjects/create', 'SubjectsController@create')->name('subjects.create');
Route::post('/subjects', 'SubjectsController@store')->name('subjects.store');
Route::post('/subjects/{id}/update', 'SubjectsController@update')->name('subjects.update');
Route::delete('/subjects/{id}', 'SubjectsController@destroy')->name('subjects.destroy');
// End Subjects

// Enrollments
Route::get('/enrollments', 'EnrollmentsController@index')->name('enrollments.index');
Route::get('/enrollments/{id}/edit', 'EnrollmentsController@edit')->name('enrollments.edit');
Route::get('/enrollments/create', 'EnrollmentsController@create')->name('enrollments.create');
Route::post('/enrollments', 'EnrollmentsController@store')->name('enrollments.store');
Route::put('/enrollments/{id}/update', 'EnrollmentsController@update')->name('enrollments.update');
Route::delete('/enrollments/{id}', 'EnrollmentsController@destroy')->name('enrollments.destroy');
// End Enrollments

// Consultations
Route::get('/consultations', 'ConsultationsController@index')->name('consultations.index');
Route::get('/consultations/{id}/edit', 'ConsultationsController@edit')->name('consultations.edit');
Route::get('/consultations/create', 'ConsultationsController@create')->name('consultations.create');
Route::post('/consultations', 'ConsultationsController@store')->name('consultations.store');
Route::put('/consultations/{id}/update', 'ConsultationsController@update')->name('consultations.update');
Route::delete('/consultations/{id}', 'ConsultationsController@destroy')->name('consultations.destroy');
// End Consultations

// Attendees
Route::post('/attendees/{consultation_id}', 'AttendeesController@create')->name('attendees.create');
// End Attendees
