<?php

namespace App\Service;

use App\Repositories\AlunosRepository;

class alunoservice
{
    private $repository;

    public function __construct(AlunosRepository $AlunosRepository)
    {
        $this->repository = $AlunosRepository;
    }

    public function listAll()
    {
        return $this->repository->listAll();
    }

    public function inadiplentes()
    {
        return $this->repository->inadiplentes();
    }

    public function getAll($qtd, $paginate = false)
    {
        return $this->repository->paginate($qtd, $paginate);
    }

    public function findById($id)
    {
        $result = $this->repository->findById($id);
        if ($result) {
            return $result;
        }
    }

    public function ByField($field)
    {
        $result = $this->repository->byField($field);
        if ($result) {
            return $result;
        }
    }

    public function create($data)
    {

        $result = $this->repository->create($data);
        if ($result) {
            return $result;
        }
    }


    public function delete($id)
    {
        $result = $this->repository->findById($id);
        if ($result) {
            $result->delete($id);
            return response()->json(['message' => 'Aluno excluido com sucesso'], 200);
        }

        return response()->json(['message' => 'Aluno Não encontrado'], 404);
    }

    public function update($data)
    {
        $result = $this->repository->update($data);
        return response()->json(['message' => 'Aluno Não encontrado'], 404);
    }

    public function search($request)
    {
        $this->repository->search($request);
    }
}
