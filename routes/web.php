<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\AlunosController;
use App\Http\Controllers\Admin\PagamentoController;

Route::prefix('painel')->group(function () {


    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::post('logout', [loginController::class, 'logout'])->name('logout');

    Route::resource('users', UserController::class);

    Route::resource('alunos', AlunosController::class);
    Route::resource('pagamento', PagamentoController::class);
    Route::get('inadiplentes', [AlunosController::class, 'inadiplentes']);
});
