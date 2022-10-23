<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{

    protected $table ='Agenda';
    protected $fillable = ['user_id',
    'aluno_id', 'data_inicio', 'data_fim','title', 'descricao'];
    protected $guarded = ['id'];

}
