<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\alunoservice;
use App\Service\pagamentoService;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PagamentoController extends Controller
{

    protected $alunoService;
    protected $pagamentoService;

    public function __construct(alunoService $alunoService, pagamentoService $pagamentoService)
    {
        $this->middleware('auth');
        $this->alunoService = $alunoService;
        $this->pagamentoService = $pagamentoService;
    }

    public function index()
    {
        $loggedId = intval(Auth::id());
        return view('admin.pagamento.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->get('aluno');
        $aluno = $this->alunoService->findById($id);

        return view('admin.pagamento.create', [
            'aluno' => $aluno
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

        $data = $request->only('user_id', 'aluno_id');
        $alunoId = $data['aluno_id'];
        $data['data_pagamento'] =  date('Y-m-d');
        $data['data_inicio'] =   date('Y-m-d', strtotime($request->data_inicio . ' + 1 days '));
        $data['data_fim']  = date('Y-m-d', strtotime($request->data_inicio . '+ 30 days'));


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            Storage::disk('public')->put($nameFile, fopen($request->file('image'), 'r+'));
            $data['image_pagamento'] = $nameFile;
        }


        $result = $this->pagamentoService->create($data);

        return redirect()
            ->route("alunos.show", $alunoId)
            ->withSuccess("Pagamento realizado com Successo");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pagamento = $this->pagamentoService->getById($id);

        if ($pagamento) {
            return view('admin.pagamento.edit', [
                'pagamento' => $pagamento
            ]);
        }

        return redirect()->route('pagamento.index');
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
        $data = $request->only('user_id', 'aluno_id', 'data_pagamento', 'data_inicio');

        if ($pagamento = $this->pagamentoService->getById($id)) {
            $data['data_fim']  = date('Y-m-d', strtotime($data['data_inicio'] . '+ 30 days'));

            $pagamento->update($data);
            return redirect()
                ->back()
                ->withSuccess("Pagamento atualizado com success");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return  $this->pagamentoService->delete($id);
    }
}
