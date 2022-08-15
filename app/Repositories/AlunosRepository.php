<?php

namespace App\Repositories;

use App\Models\Alunos;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AlunosRepository
{
    private $model;

    public function __construct(Alunos $model)
    {
        $this->model = $model;
    }

    private function agora()
    {
        return Carbon::now();
    }

    private function hoje()
    {
        return Carbon::today();
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function paginate()
    {
        return $this->model::with('pagamento')->orderBy('nome', 'ASC')->get();
    }

    public function findByID($id)
    {
        return $this->model::with('pagamento')->find($id);
    }

    public function byField($field)
    {
        $alunos = DB::select("SELECT DISTINCT a.* , 
        CASE
            WHEN data_pagamento = NULL THEN 'Nunca foi pago'
            WHEN data_fim > CURDATE() THEN 'Em dia'
            ELSE 'Está devendo'
        END AS statusPG, 
            p.aluno_id, p.data_pagamento , p.data_fim 
        FROM alunos AS a
        LEFT JOIN pagamento  AS p
        ON a.id = p.aluno_id WHERE a.nome LIKE '%{$field}%' 
        AND a.deleted_at is null 
        AND p.deleted_at is NULL   order by p.data_pagamento DESC  LIMIT 1");

        return $alunos;
    }

    public function inadiplentes()
    {
        return DB::select("SELECT  DISTINCT  a.*,
        CASE
          WHEN data_pagamento = NULL THEN 'Nunca foi pago'
          WHEN data_pagamento < data_fim THEN 'Em dia'
          ELSE 'Está atrasado' 
          END  AS statusPG     
          FROM alunos AS a 
          LEFT JOIN pagamento  AS p 
          ON a.id = p.aluno_id  WHERE a.deleted_at IS NULL AND data_fim IS NULL OR  data_fim < CURDATE()
        ");
    }

    public function emdia()
    {
        return $this->model::with('pagamento')->where('status', 'false')->paginate();
    }

    public function orderBy()
    {
        $agora = $this->agora();
        $hoje = $this->hoje();

        return DB::table('alunos')
            ->whereBetween('created_at', [$hoje, $agora->addDays(5)])
            ->take(5)
            ->get();
    }

    public function byDate($start, $end)
    {
        return $this->model::with('pagamento')->orderBy('id', 'desc')->whereBetween('created_at', [$start, $end])->get();
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
                $query->orWhere('nome', 'LIKE', "%{$request->filter}%");
                $query->orWhere('whatssap', $request->filter);
            }
        })
            ->latest()
            ->paginate();
    }
}
