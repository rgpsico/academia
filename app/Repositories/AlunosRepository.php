<?php

namespace App\Repositories;

use App\Models\Alunos;

class AlunosRepository
{
    private $model;

    public function __construct(Alunos $model)
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
        return $this->model::where('status', '=', '')->paginate(10);
    }

    public function delete($id)
    {
        return $this->model::delete($id);
    }

    public function update($data)
    {
        return $this->model->update($data);
    }

    public function updateStatusAluno($aluno_id)
    {
        return $update = $this->model::where('id', $aluno_id)->update(['id' => $aluno_id, 'status' => 'Mês Pago']);
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
