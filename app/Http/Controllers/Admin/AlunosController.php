<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\alunosRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\alunos;
use App\Models\categoria;
use App\Service\alunoservice;
use App\Service\pagamentoService;
use Carbon\Carbon;

class AlunosController extends Controller
{
    private $service;
    private $pagamentoService;
    private $repository;

    public function __construct(alunoservice $alunoservice, pagamentoService $pagamento)
    {
        $this->pagamentoService = $pagamento;
        $this->service = $alunoservice;
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
        $alunos = $this->service->findById($id);
        $pagamento = $this->pagamentoService->getById($id);


        $loggedId = intval(Auth::id());

        return view('Admin.alunos.show', [
            'alunos' => $alunos,
            'pagamento' => $pagamento

        ]);
    }



    public function inadiplentes()
    {
        $alunos = $this->service->inadiplentes();
        $loggedId = intval(Auth::id());


        return view('Admin.alunos.index', [
            'alunos' => $alunos

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias =  categoria::all();
        return view('Admin.alunos.create', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataAtual = Carbon::now();
        $dataNow = $dataAtual->toDateTimeString();

        $data = $request->all();

        $criarArtigo = $this->service->create($data);

        return redirect()
            ->route('alunos.index')
            ->withSuccess("Cadastrado com Successo");
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
    public function update(alunosRequest $request, $id)
    {
        if (!$alunos = $this->service->findById($id)) {
            return redirect()->back();
        }

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $upload = $request->file('image')->store('portifolio');
            $alunos->cover  = $upload;
        }

        $alunos->update($data);
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
