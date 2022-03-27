<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlunoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\categoria;
use App\Service\alunoservice;
use App\Service\pagamentoService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AlunosController extends Controller
{
    private $service;
    private $pagamentoService;
    private $repository;

    public function __construct(alunoservice $alunoservice, pagamentoService $pagamento)
    {
        $this->pagamentoService = $pagamento;
        $this->service = $alunoservice;
        $this->middleware('auth');
    }

    public function index()
    {
        $alunos = $this->service->getAll(90);

        $loggedId = intval(Auth::id());


        return view('Admin.alunos.index', [
            'alunos' => $alunos


        ]);
    }

    public function show($id)
    {
        $loggedId = intval(Auth::id());
        $alunos = $this->service->findById($id);
        $pagamentos = $this->pagamentoService->getByAlunoId($id);

        $pagamentoStatus = $this->pagamentoService->pagamentoStatus($id);

        return view('Admin.alunos.show', [
            'alunos' => $alunos,
            'pagamentos' => $pagamentos,
            'pagamentoStatus' =>  $pagamentoStatus

        ]);
    }



    public function inadiplentes()
    {
        $alunos = $this->service->inadiplentes();
        $loggedId = intval(Auth::id());


        return view('Admin.alunos.index', [
            'alunos' => $alunos,
            'inadiplentes' => true

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.alunos.create');
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

        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;

        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->image->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->image->storeAs('alunos', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

            // Verifica se NÃO deu certo o upload (Redireciona de volta)

            $data['avatar'] = $nameFile;
            $criarArtigo = $this->service->create($data);

            return redirect()
                ->route('alunos.index')
                ->withSuccess("Cadastrado com Successo");
        }
    }


    public function ValidarPagamento()
    {
        //pegar a  ultima data  final
        //verificar se a data final é maior que o dia que estamos
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
            return view('Admin.alunos.edit', [
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


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['avatar'] = $request->file('image')->store('alunos');
            $aluno->cover  = $data;
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
        //$filters = $request->only('filter');

        //    $alunos = $this->service->search($filters);

        //  return view('alunos.index', compact('alunos', 'filters'));
    }
}
