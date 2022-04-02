<?php

namespace App\Repositories;

use App\Models\Alunos;
use Illuminate\Support\Facades\DB;

class AlunosRepository
{
    private $model;


    public function __construct(Alunos $model)
    {
        $this->model = $model;
    }

    public function paginate()
    {
        $alunos = DB::select("SELECT a.* , 
        CASE
            WHEN data_pagamento = NULL THEN 'Nunca foi pago'
            WHEN data_fim > CURDATE() THEN 'Em dia'
            ELSE 'Está atrasado'
        END
        
         AS statusPG, p.aluno_id, p.data_pagamento , p.data_fim   FROM alunos AS a 
        LEFT JOIN pagamento  AS p
        ON a.id = p.aluno_id");
        return $alunos;
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
        return $this->model::where('status', '<>', 'true')->paginate(10);
    }

    public function delete($id)
    {

        return $this->model::delete($id);
    }

    public function update($data)
    {
        return $this->model->update($data);
    }

    public function updateStatusAluno($aluno_id, $status)
    {
        return $update = $this->model::where('id', $aluno_id)->update(['id' => $aluno_id, 'status' => $status]);
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
