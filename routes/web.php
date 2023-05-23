<?php

use App\Http\Controllers\BackOfficeController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\TypeFormationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiplomeController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\FtaeController;
use App\Http\Controllers\MotifController;
use App\Http\Controllers\ObjetController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\ResolutionApportersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   return  to_route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::resource('user',UserController::class);
    Route::resource('ecole',EcoleController::class);
    Route::resource('formation',TypeFormationController::class);
    Route::resource('diplome',DiplomeController::class);
    Route::resource('programme',ProgrammeController::class);
    Route::resource('motif',MotifController::class);
    Route::resource('objet',ObjetController::class);
    Route::resource('resolution',ResolutionApportersController::class);
    Route::resource('backoffice',BackOfficeController::class);
    
    Route::get('filtre/index',[FilterController::class,'index'])->name('filtre');
    Route::get('filtre/edit/{id}',[FilterController::class,'edit'])->name('filtre.edit');
    Route::get('filtre/show/{id}',[FilterController::class,'show'])->name('filtre.show');
    Route::get('filtre/getfiltre',[FilterController::class,'filtre'])->name('filtre.getfiltre');
    Route::get('filtre/imprime',[FilterController::class,'imprime'])->name('filtre.imprime');
    Route::put('filtre/update',[FilterController::class,'update'])->name('filtre.update');
   
});


Route::get('formulaire/tae',[FtaeController::class,'index'])->name('formulaire_tae');


//get type formation by  ecole

Route::get('formulaire/typeformation',[FtaeController::class,'getFormation'])->name('getFormation');


//get diplome by  type formation

Route::get('formulaire/diplome',[FtaeController::class,'getDiplome'])->name('getDiplome');

//get programme by  type diplome

Route::get('formulaire/programme',[FtaeController::class,'getProgramme'])->name('getProgramme');

//get objet by  motif
Route::get('formulaire/objet',[FtaeController::class,'getObjet'])->name('getObjet');


Route::post('formulaire/store',[FtaeController::class,'store'])->name('store');




