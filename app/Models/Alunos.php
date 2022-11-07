<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alunos extends  Authenticatable
{

        use HasFactory;

       protected $table = 'alunos';

       protected $fillable = ['nome', 'password', 'whatssap', 'status', 'instagran', 'avatar'];

       public $timestamps = false;


        public function pagamento()
        {
            return $this->hasMany(Pagamento::class, 'aluno_id');
        }

        public function alunoPagamento()
        {
            return $this->hasMany(AlunoPagamento::class, 'aluno_id');
        }
}



