<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\SalesController;

Auth::routes();

// login2, register2 pages
Route::view('login2', 'auth.login2');
Route::view('login3', 'auth.login3');
Route::view('register2', 'auth.register2');
Route::view('register3', 'auth.register3');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/books', function () {
    return view('books');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/branches', function () {
    return view('branches');
});

Route::get('/batch-schedule', function () {
    return view('batch-schedule');
});

Route::get('/blogs', function () {
    return view('blogs');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});



// GUI crud builder routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

    Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

    Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

    Route::post(
        'generator_builder/generate-from-file',
        '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
    )->name('io_generator_builder_generate_from_file');

    // Model checking
    Route::post('tableCheck', 'AppBaseController@tableCheck');

    include 'web_builder.php';

});
Route::get('empty_table', 'JoshController@emptyTable');
Route::get('remove_all_files', 'JoshController@remove_all_files');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('{name?}', 'JoshController@showView');

