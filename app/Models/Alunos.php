<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'whatssap', 'status', 'instagran', 'avatar'];
    public $timestamps = false;


    public function pagamento()
    {
        return $this->hasMany(Pagamento::class, 'aluno_id');
    }
}
