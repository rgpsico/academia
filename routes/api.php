<?php

use App\Http\Controllers\Admin\AlunosController;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\AlunosControllerApi;
use App\Http\Controllers\Api\AtividadesControllerApi;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LocalControllerApi;
use App\Http\Controllers\Api\UserControllerApi;
use Illuminate\Support\Facades\Route;

Route::get('/alunos/search/{nome}', [AlunosControllerApi::class, 'search']);
Route::get('/alunos/laststudents', [AlunosControllerApi::class, 'lastStudents']);



 Route::resource('/alunos', AlunosControllerApi::class);

 Route::resource('/atividades', AtividadesControllerApi::class);

 Route::resource('/local', LocalControllerApi::class);

 Route::post('/alunoapi/store', [AlunosController::class, 'store']);



 Route::get('/agenda', [AgendaController::class, 'all']);

 Route::post('/agenda/store', [AgendaController::class, 'store']);

 Route::delete('/agenda/{id}/delete', [AgendaController::class, 'destroy']);

Route::get('/alunos/byDate/{start}/{end}', [AlunosControllerApi::class, 'byDate']);

Route::post('/auth', [AuthController::class, 'auth']);

Route::get('/users', [UserControllerApi::class, 'all']);
