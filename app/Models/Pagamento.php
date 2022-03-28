<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pagamento extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'aluno_id', 'data_pagamento', 'data_fim'];
    protected $table = "pagamento";



    // public function getDataPagamentoattribute($value)
    // {
    //     return date('d/m/Y', strtotime($value));
    // }

    // public function getDataFimattribute($value)
    // {
    //     return date('d/m/Y', strtotime($value));
    // }

    public function alunos()
    {
        return $this->hasOne(alunos::class, 'id', 'aluno_id');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
