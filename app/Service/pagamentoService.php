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

    public function getById($id)
    {
        return $this->repository::where('aluno_id', $id)->get();
    }

    public function getFinalDate($id)
    {
        return  $this->repository::where('aluno_id', $id)->orderBy('data_fim', 'desc')->first();
    }


    public function pagamentoStatus()
    {
        $hoje    = '2022-03-27';
        $dataFim = '2022-03-27';

        if ($this->repository->where($dataFim, '=', $hoje . ' 00:00:00')) {
            return "maior";
        }
        return "menor";
    }

    public function create($data)
    {
        $result = $this->repository->create($data);

        if ($result) {
            return $result;
        }
    }
}
