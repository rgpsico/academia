<?php

use App\Http\Controllers\Api\AlunosControllerApi;
use Illuminate\Support\Facades\Route;





Route::resource('/alunos', AlunosControllerApi::class);
