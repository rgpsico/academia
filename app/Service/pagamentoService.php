<?php

namespace App\Service;

use App\Models\Pagamento;

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
}
