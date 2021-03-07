<?php

use Illuminate\Support\Facades\Route;

Route::post('users/{user}/public-key', 'UserController@publicKey')->name('users.publicKey');

Route::resource('samples', 'SampleController', ['except' => ['delete', 'edit']]);
Route::resource('assessments', 'AssessmentController', ['except' => ['destroy', 'create', 'store', 'update', 'show']]);
// Route::resource('relationships', 'RelationshipController', ['except' => ['destroy', 'show']]);
// Route::resource('relationships/{relationship}/users', 'RelationshipUserController', ['except' => ['destroy', 'show', 'edit'], 'as' => 'relationship']);
// Route::put('relationship-users/{relationshipUser}', 'RelationshipUserController@update')->name('relationship.users.update');

Route::resource('centers', 'CenterController', ['except' => ['destroy']]);
Route::post('centers/{center}/request', 'CenterController@request')->name('centers.request');

Route::get('centers/{center}/users', 'CenterUserController@index')->name('center.users.index');
Route::put('centers/{center}/users/{user}', 'CenterUserController@update')->name('center.users.update');
Route::post('centers/{center}/users', 'CenterUserController@store')->name('center.users.store');
Route::get('centers/{center}/users/create', 'CenterUserController@create')->name('center.users.create');
Route::get('centers/{center}/users/{user}', 'CenterUserController@show')->name('center.users.show');
Route::get('centers/{center}/users/{user}/edit', 'CenterUserController@edit')->name('center.users.edit');

Route::resource('rooms', 'RoomController');
Route::resource('rooms/{room}/users', 'RoomUserController', ['except' => ['destroy', 'show', 'edit'], 'as' => 'room']);


Route::resource('cases', 'CaseController', ['except' => 'create', 'store']);
Route::get('rooms/{room}/cases/create', 'CaseController@create')->name('room.cases.create');
Route::post('rooms/{room}/cases', 'CaseController@store')->name('room.cases.store');

Route::resource('cases/{case}/users', 'CaseUserController', ['except' => ['destroy', 'show', 'edit'], 'as' => 'case']);
Route::put('cases/{case}/sessions/{session}', 'CaseController@sessionUpdate')->name('cases.sessions.sessionUpdate');
Route::post('users/request', 'UserController@request')->name('users.request');
Route::post('users/accept', 'UserController@accept')->name('users.accept');

Route::post( 'samples/{sample}/scoring', 'SampleController@scoring')->middleware('auth')->name('samples.scoring');
Route::get('samples/{sample}/scoring', 'SampleController@scoreResult')->middleware('auth')->name('samples.scoring.show');
Route::put('samples/{sample}/close', 'SampleController@close')->middleware('auth')->name('samples.close');
Route::put('samples/{sample}/open', 'SampleController@open')->middleware('auth')->name('samples.open');


Route::get('sessions/calendar', 'SessionController@calendar')->name('sessions.calendar');
Route::resource('sessions', 'SessionController', ['except' => ['create']]);
Route::get('cases/{case}/sessions/create', 'SessionController@create')->name('sessions.create');
Route::post('cases/{case}/sessions/create', 'SessionController@store')->name('sessions.store');

Route::put('sessions/{session}/status', 'SessionController@sessionUpdate')->name('sessions.sessionUpdate');

Route::resource('documents', 'DocumentController');

Route::resource('sessions/{session}/report', 'SessionReportController', ['as' => 'sessions']);

Route::resource('/sessions/{session}/practices', 'PracticeController', ['as' => 'sessions']);
Route::post('/sessions/{session}/practices/{practice}', 'PracticeController@storeHomework')->name('sessions.practices.homework.store');
// Route::get('/sessions/{session}/practices/{practice}', 'PracticeController@createData')->name('sessions.practices.attachments.create');
