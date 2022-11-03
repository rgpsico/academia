<?php

use App\Http\Controllers\Admin\AlunosController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PagamentoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProfessorController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/teste', [HomeController::class, 'index']);

Route::get('profile/{id}', [AlunosController::class, 'profile']);

Route::get('login', [AlunosController::class, 'login']);
Route::post('auth', [AlunosController::class, 'auth'])->name('alunos.auth');
Route::prefix('painel')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('login');
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::post('logout', [loginController::class, 'logout'])->name('logout');

    Route::resource('users', UserController::class);

    Route::get('config/', [ConfigController::class, 'show'])->name('config.edit');
    Route::put('config/update', [ConfigController::class, 'update'])->name('config.update');
    Route::resource('pagamento', PagamentoController::class);
    Route::get('inadiplentes', [AlunosController::class, 'inadiplentes']);
    Route::get('emdia', [AlunosController::class, 'emdia']);

    Route::get('alunos/search', [AlunosController::class, 'search'])->name('alunos.search');
    Route::resource('alunos', AlunosController::class);

    Route::get('agenda', [ProfessorController::class, 'agenda']);

    Route::resource('professor', ProfessorController::class);





});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');

    return 'Cache is cleared';
});
