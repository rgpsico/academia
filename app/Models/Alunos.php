<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'whatssap', 'status', 'instagran'];
    public $timestamps = false;
}
