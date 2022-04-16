<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Pagamento extends Model
{
    use HasFactory, SoftDeletes;
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

    public function getStatusAttribute()
    {
        $value = $this->data_fim;
        $hoje =  Carbon::now();
        $data_fim = Carbon::createFromFormat('Y-m-d', $value ?? '2022-01-01');
        return $data_fim->gt($hoje) ? 'Em dia' : 'devendo';
    }

    public function alunos()
    {
        return $this->belongsTo(alunos::class, 'aluno_id', 'id')->orderBy('nome');
    }

    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
