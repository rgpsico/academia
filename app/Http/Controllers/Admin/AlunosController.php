<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlunoRequest;
use App\Http\Resources\AlunosResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\categoria;
use App\Repositories\AlunosRepository;
use App\Repositories\ConfigRepository;
use App\Service\alunoservice;
use App\Service\pagamentoService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlunosController extends Controller
{
    private $service;
    private $pagamentoService;
    private $repository;

    public function __construct(AlunosRepository $AlunosRepository, pagamentoService $pagamento)
    {
        $this->pagamentoService = $pagamento;
        $this->service = $AlunosRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        $alunos = $this->service->paginate();


        $whatssapMessage = app(ConfigRepository::class)->config();

        $loggedId = intval(Auth::id());

        return view('admin.alunos.index', [
            'alunos' => $alunos,
            'mensagem_whatssap' => $whatssapMessage
        ]);
    }

    public function emdia()
    {
        $alunos =  $this->pagamentoService->emdia();

        $loggedId = intval(Auth::id());

        return view('admin.alunos.emdia', [
            'alunos' => $alunos,
        ]);
    }

    public function inadiplentes()
    {
        $alunos = $this->pagamentoService->inadiplentes();

        $loggedId = intval(Auth::id());
        $whatssapMessage = app(ConfigRepository::class)->config();

        return view('admin.alunos.inadiplentes', [
            'alunos' => $alunos,
            'mensagem_whatssap' => $whatssapMessage


        ]);
    }

    public function show($id)
    {
        $loggedId = intval(Auth::id());
        $alunos = $this->service->findById($id);

        $pagamentos = $this->pagamentoService->getByAlunoId($id);
        $ultimoPagamento = $this->pagamentoService->getFinalDate($id);
        $pagamentoStatus = $this->pagamentoService->pagamentoStatus($id);


        return view('admin.alunos.show', [
            'alunos' => $alunos,
            'pagamentos' =>  $pagamentos,
            'ultimoPagamento' => $ultimoPagamento,
            'pagamentoStatus' => $pagamentoStatus
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   AlunoRequest
     * @return \Illuminate\Http\Response
     */
    public function store(AlunoRequest $request)
    {
        $dataAtual = Carbon::now();
        $dataNow = $dataAtual->toDateTimeString();

        $data = $request->all();

        $data['whatssap'] = str_replace(' ', '', $data['whatssap']);

        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;

        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {


            $name = uniqid(date('HisYmd'));

            $extension = $request->image->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = $request->file('image')->store('alunos');

            $data['avatar'] = $upload;

            $criarArtigo = $this->service->create($data);

            return redirect()
                ->route('alunos.index')
                ->withSuccess("O Aluno {$data['nome']} foi Cadastrado com Successo");
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = $this->service->findById($id);
        if ($aluno) {
            return view('admin.alunos.edit', [
                'aluno' => $aluno
            ]);
        }
        return redirect()->route('alunos.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        if (!$aluno = $this->service->findById($id)) {
            return redirect()->back();
        }

        $data = $request->all();
        $data['whatssap'] = str_replace(' ', '', $data['whatssap']);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['avatar'] = $request->file('image')->store('alunos');
            $aluno->avatar  = $data;
        }

        $aluno->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminatse\Http\Response
     */
    public function destroy($id)
    {

        $alunos = $this->service->findById($id);
        $alunos->delete();
        return redirect()->route('alunos.index')->withSuccess("Excluido Com Successo");
    }

    public function search(Request $request)
    {

        $nome = $request->nome;

        if ($alunos = $this->service->ByField($nome)) {
            $id = $alunos->id ?? false;

            $pagamentoStatus = $this->pagamentoService->pagamentoStatus($id);
            return view('admin.alunos.index', [
                'alunos' => $alunos,
                'pagamentoStatus' =>  $pagamentoStatus
            ]);
        }

        return redirect()->route('alunos.index')->withErrors("O Aluno {$nome} não foi encontrado");
    }
}
