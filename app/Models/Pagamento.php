<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pagamento extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'data'];
    protected $table = "pagamento";
}
