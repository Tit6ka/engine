<?php

Route::match(['get', 'post'], '/', '\App\Controllers\Template@main');

Route::match(['get', 'post'], '/auth', '\App\Controllers\Template@auth');
Route::match(['get', 'post'], '/exit', '\App\Controllers\Template@logout');
Route::match(['get', 'post'], '/profile', '\App\Controllers\Template@profile');
Route::match(['get', 'post'], '/profile/setting', '\App\Controllers\Template@profileSetting');
Route::match(['get', 'post'], '/profile/{id}', '\App\Controllers\Template@profileId');
Route::match(['get', 'post'], '/reset', '\App\Controllers\Template@reset');
Route::match(['get', 'post'], '/reset/{id}', '\App\Controllers\Template@resetId');

Route::match(['get', 'post'], '/donate', '\App\Controllers\Template@donate');

Route::match(['get', 'post'], '/chat', '\App\Controllers\Template@chat');

Route::match(['get', 'post'], '/start', '\App\Controllers\Template@start');

Route::match(['get', 'post'], '/ajax', '\App\Controllers\Template@ajax');
Route::match(['get', 'post'], '/imageload', '\App\Controllers\Template@imageLoad');

Route::match(['get', 'post'], '/about', '\App\Controllers\Template@about');

Route::match(['get', 'post'], '/map', '\App\Controllers\Template@map');

Route::match(['get', 'post'], '/radio', '\App\Controllers\Template@radio');

Route::match(['get', 'post'], '/issue', '\App\Controllers\Template@issue');
Route::match(['get', 'post'], '/issue/add', '\App\Controllers\Template@issueAdd');
Route::match(['get', 'post'], '/issue/open', '\App\Controllers\Template@issueOpen');
Route::match(['get', 'post'], '/issue/close', '\App\Controllers\Template@issueClose');
Route::match(['get', 'post'], '/issue/trash', '\App\Controllers\Template@issueTrash');
Route::match(['get', 'post'], '/issue/{id}', '\App\Controllers\Template@issueFull');

Route::match(['get', 'post'], '/news', '\App\Controllers\Template@news');
Route::match(['get', 'post'], '/news/add', '\App\Controllers\Template@newsAdd');
Route::match(['get', 'post'], '/news/edit/{id}', '\App\Controllers\Template@newsEdit');
Route::match(['get', 'post'], '/news/{id}', '\App\Controllers\Template@newsFull');

Route::match(['get', 'post'], '/api', '\App\Controllers\Template@api');
Route::match(['get', 'post'], '/api/{method}', '\App\Controllers\Api@checkMethod');