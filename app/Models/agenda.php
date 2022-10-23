<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'aluno_id', 'data_inicio', 'data_fim', 'descricao'];
}
