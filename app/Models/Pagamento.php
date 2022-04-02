<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pagamento extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'aluno_id', 'data_pagamento', 'data_inicio', 'data_fim'];
    protected $table = "pagamento";



    // public function getDataPagamentoattribute($value)
    // {
    //     return date('d/m/Y', strtotime($value));
    // }

    // public function getDataFimattribute($value)
    // {
    //     return date('d/m/Y', strtotime($value));
    // }

    public function pagamentoStatus($id)
    {
        // $dataDeVencimento    = $this->getFinalDate($id);

        // $res = $this->repository->where('data_fim', '>=', DB::raw('CURDATE()'))->count();
        $res = 'teste';
        return $res;
    }

    public function alunos()
    {
        return $this->belongsTo(alunos::class, 'id', 'aluno_id');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
