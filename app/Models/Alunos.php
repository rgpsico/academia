<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Alunos extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nome', 'whatssap', 'status', 'instagran', 'avatar'];
    public $timestamps = false;

    protected $dates = ['deleted_at'];



    public function pagamento()
    {
        return $this->hasMany(Pagamento::class, 'aluno_id')->orderBy('data_fim', 'DESC');
    }
}
