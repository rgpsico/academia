<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Alunos extends Model 
{ 

    //protected $table ='tabela';
    // protected $fillable = ['name','title']; 
    protected $guarded = ['id']; 

}