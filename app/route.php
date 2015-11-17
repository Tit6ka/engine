<?php

Route::match(['get', 'post'], '/', '\App\Controllers\Template@main');

Route::match(['get', 'post'], '/api', '\App\Controllers\Template@api');