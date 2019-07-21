<?php


Route::group(['middleware' => 'auth'], function () {
    Route::get('chat', 'Chat\ChatController@index')->middleware('auth')->name('chat');
    Route::post('chat/message', 'Chat\ChatController@store');
    Route::get('chat/messages', 'Chat\ChatController@messages');
    Route::get('meu-perfil', 'User\UserController@profile')->name('profile');
    Route::post('meu-perfil', 'User\UserController@profileUpdate')->name('profile-update');
});



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
