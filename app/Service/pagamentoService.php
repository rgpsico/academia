<?php

namespace App\Service;

use App\Models\Pagamento;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class pagamentoService
{
    private $repository;

    public function __construct(Pagamento $repository)
    {

        $this->repository = $repository;
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
        //Carbon::parse($dataFim->data_fim)->format('Y-m-d');
        if ($dataFim = $this->repository::where('aluno_id', $id)->orderBy('data_fim', 'desc')->first()) {
            return $dataFim->data_fim;
        }
    }

    public function getStartDate($id)
    {
        if ($dataPagamento = $this->repository::where('aluno_id', $id)->orderBy('data_pagamento', 'desc')->first()) {
            return $dataPagamento->data_pagamento;
        }
    }


    public function pagamentoStatus($id)
    {

        $dataStart    = $this->getStartDate($id);
        $dataFim = $this->getFinalDate($id);

        if ($this->repository->whereBetween('data_fim', [$dataStart, $dataFim])->count()) {
            return true;
        }
    }

    public function create($data)
    {
        $result = $this->repository->create($data);

        if ($result) {
            return $result;
        }
    }
}
