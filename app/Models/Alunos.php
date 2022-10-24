<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alunos extends Model
{

        use HasFactory, SoftDeletes;
        protected $fillable = ['nome', 'whatssap', 'status', 'instagran', 'avatar'];
        public $timestamps = false;


        public function pagamento()
        {
            return $this->hasMany(Pagamento::class, 'aluno_id');
        }
}



