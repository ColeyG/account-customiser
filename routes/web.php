<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('/imagesubmit','ImageController@create');

Route::get('/imageget','ImageController@get');

Route::get('/imageset', 'ImageController@userImage');

Route::get('/uimageget', 'ImageController@getUserImage');
