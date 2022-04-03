<?php

namespace App\Service;

use App\Models\Alunos;
use App\Models\Pagamento;
use App\Repositories\AlunosRepository;
use Carbon\Carbon;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;

class pagamentoService
{
    private $repository;
    private $alunoRepository;
    private $modelAluno;

    public function __construct(
        Pagamento $repository,
        AlunosRepository $alunoRepository,
        Alunos $modelAluno
    ) {
        $this->repository = $repository;
        $this->alunoRepository = $alunoRepository;
        $this->modelAluno = $modelAluno;
    }

    public function getByAlunoId($id)
    {
        return $this->repository::where('aluno_id', $id)->get();
    }

    public function getById($id)
    {
        return  $this->repository->find($id);
    }

    public function getFinalDate($id)
    {
        if ($dataFim = $this->repository::where('aluno_id', $id)->orderBy('data_fim', 'desc')->first()) {
            return $dataFim->data_fim;
        }
    }

    public function getStartDate($id)
    {
        if ($dataPagamento = $this->repository::where('aluno_id', $id)->orderBy('data_inicio', 'desc')->first()) {
            return $dataPagamento->data_pagamento;
        }
    }


    public function pagamentoStatus($id)
    {
        $dataDeVencimento    = $this->getFinalDate($id);
        $res = $this->repository->where('data_fim', '>=', DB::raw('CURDATE()'))->count();



        return $res;
    }

    public function create($data)
    {
        $aluno_id = $data['aluno_id'];
        $result = $this->repository->create($data);
        $this->alunoRepository->updateStatusAluno($aluno_id, 'true');
        if ($result) {
            return $result;
        }
    }

    public function update($id, $data)
    {
        if (!$pagamento = $this->repository::find($id)) {
            return redirect()->back();
        }
        return $this->repository->update($data);
    }

    public function delete($id)
    {

        if ($pagamento = $this->repository::find($id)) {

            $aluno_id = $pagamento->aluno_id;
            $this->alunoRepository->updateStatusAluno($aluno_id, 'false');
            $pagamento->delete();
            return redirect()->route('alunos.show', $aluno_id)
                ->withSuccess("Pagamento Excluido com successo");
        };

        return redirect()->back()
            ->withErrors("Nao foi possivel excluir Aluno pagamento selecionado");
    }
}
