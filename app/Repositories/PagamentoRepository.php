<?php

namespace App\Repositories;

use App\Models\pagamento;

class PagamentoRepository
{
    private $model;

    public function __construct(pagamento $model)
    {
        $this->model = $model;
    }

    public function paginate($qtd)
    {
        return $this->model::paginate($qtd);
    }

    public function findByID($id, $fail = true)
    {
        return $this->model::find($id);
    }


    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function listAll()
    {
        return $this->model::paginate(10);
    }

    public function inadiplentes()
    {
        return $this->model::all();
    }

    public function delete($id)
    {
        return $this->model::delete($id);
    }

    public function update($data)
    {
        return $this->model::update($data);
    }

    public function getFinalDate($id)
    {
        //Carbon::parse($dataFim->data_fim)->format('Y-m-d');
        if ($dataFim = $this->model::where('aluno_id', $id)->orderBy('data_fim', 'desc')->first()) {
            return $dataFim->data_fim;
        }
    }

    public function getStartDate($id)
    {
        if ($dataPagamento = $this->model::where('aluno_id', $id)->orderBy('data_pagamento', 'desc')->first()) {
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

    public function search($request)
    {
        $this->model->where(function ($query) use ($request) {
            if ($request->filter) {
                $query->orWhere('body', 'LIKE', "%{$request->filter}%");
                $query->orWhere('title', $request->filter);
            }
        })
            ->latest()
            ->paginate();
    }
}
