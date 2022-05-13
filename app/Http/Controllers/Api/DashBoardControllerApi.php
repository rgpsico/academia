<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\AlunoRequest;
use App\Http\Resources\AlunosResponse;
use App\Models\Alunos;
use App\Repositories\AlunosRepository;
use App\Service\alunoservice;
use App\Service\pagamentoService;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashBoardControllerApi extends Controller
{
    private $service;
    private $pagamentoService;
    private $repository;

    public function __construct(AlunosRepository $AlunosRepository, pagamentoService $pagamento)
    {
        $this->pagamentoService = $pagamento;
        $this->AlunosRepository = $AlunosRepository;
        //$this->middleware('auth');
    }

    public function index()
    {

        $alunos = $this->AlunosRepository->paginate();

        $loggedId = intval(Auth::id());

        return AlunosResponse::collection($alunos);
    }
}
