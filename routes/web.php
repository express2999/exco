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

Route::get('/', function () {
    return view('search');
})->name('mainpage');

Route::get('/nav', function () {
    return view('navbar');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/searchresults', function () {
    return view('searchresults');
})->name("dina");

Route::get('/mainsearchresults', function () {
    return view('mainsearchresults');
});


Route::group(['prefix'=>'data', 'middleware' => ['auth:web']], function(){
    Route::get('/data-entry',[App\Http\Controllers\mainController::class , 'enter']);
    Route::get('/add',[App\Http\Controllers\mainController::class, 'add'])->name('add');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/relate/',[\App\Http\Controllers\relations::class, 'relation'])->name('mego');
Route::get('/product/',[\App\Http\Controllers\relations::class, 'product'])->name('product');
Route::get('/cross/',[\App\Http\Controllers\relations::class, 'cross'])->name('cross');

Route::get('description/{part}',[\App\Http\Controllers\relations::class, 'description'])->name('description');


############################# AJAX ###################################################

Route::get('equipmentType/{thedata}',[\App\Http\Controllers\relations::class,'equipmentType']);

Route::get('getCompanies/{mydata}',[\App\Http\Controllers\relations::class,'getCompanies']);

Route::get('getData/{manufacturer}/{equipmentType}/{make}/{model}/{modelSN}/{engineManufacturer}/{engine}/{engineSerial}/{year}',[\App\Http\Controllers\relations::class,'getData']);

Route::get('make/{equipmentTypeID}/{manufacturer}',[\App\Http\Controllers\relations::class,'getMake']);

Route::get('model/{makeID}/{manufacturer}/{equipmentType}',[\App\Http\Controllers\relations::class,'getmodel']);

Route::get('modelsn/{modelID}/{makeID}/{manufacturer}/{equipmentType}',[\App\Http\Controllers\relations::class,'getmodelsn']);

Route::get('enginemanu/{modelID}/{makeID}/{manufacturer}/{equipmentType}',[\App\Http\Controllers\relations::class,'enginemanu']);

Route::get('engine/{enginemanuID}/{modelID}/{makeID}/{manufacturer}/{equipmentType}',[\App\Http\Controllers\relations::class,'getIngine']);

Route::get('engineSN/{engineID}/{enginemanuID}/{modelID}/{makeID}/{manufacturer}/{equipmentType}',[\App\Http\Controllers\relations::class,'getIngineSN']);

Route::get('year/{engineID}/{enginemanuID}/{modelID}/{makeID}/{manufacturer}/{equipmentType}',[\App\Http\Controllers\relations::class,'year']);



Route::get('filterType/{filterType}',[\App\Http\Controllers\relations::class,'filterType']);

Route::post('dimensionsearch/',[\App\Http\Controllers\relations::class,'dimensionsearch'])->name('dimensionsearch');

############################# AJAX ###################################################


############################# Autocomplete ##############################
Route::get('/autocomplete', [\App\Http\Controllers\AutocompleteController::class, 'index']);
Route::get('/autocomplete/fetch', [\App\Http\Controllers\AutocompleteController::class, 'fetch'])->name('autocomplete.fetch');
############################# Autocomplete ##############################







############################# Sidebar ##############################

Route::get('/dimensions', function () {
    return view('dimensions');
})->name("dimensions");

Route::get('advancedsearch/',function () {
    return view('advancedsearch');
})->name('advancedsearch');

############################# Sidebar ##############################

