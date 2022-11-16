<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alunos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard.index');
    }

    public function teste()
    {
        return view('admin.teste');
    }

    public function graficosView()
    {
        $ativos = Alunos::select(DB::raw("SUM(id) as count"))  
        ->orderBy("created_at")  
        ->groupBy(DB::raw("year(created_at)"))  
        ->where('status', 1)
        ->get()->toArray();  
    $ativo = array_column($ativos, 'count');  
      
    $inativo = Alunos::select(DB::raw("SUM(id) as count"))  
        ->orderBy("created_at")  
        ->groupBy(DB::raw("year(created_at)"))  
        ->where('status', 0)
        ->get()->toArray();  
    $inativo = array_column($inativo, 'count');  
      
    return view('Admin.dashboard.graficos')  
            ->with('ativo',json_encode($ativo,JSON_NUMERIC_CHECK))  
            ->with('inativo',json_encode($inativo,JSON_NUMERIC_CHECK));  
        return view('Admin.dashboard.graficos');
    }

    public function graficos()
    {
        $usuarios = Alunos::select(DB::raw('Date(created_at) as date'), 
        DB::raw('count(*) as alunos')) 
        ->groupBy(DB::raw('Date(created_at)'))
        ->orderBy(DB::raw('Date(created_at)'))
        ->get()->toArray();

        $data = Alunos::select('*') ->whereMonth('created_at', Carbon::now()->month)->get();
        $day = Alunos::whereDay('created_at', '=', '23')->get()->toArray();;;
        $mes = Alunos::whereMonth('created_at', '=', '1')->get()->toArray();;
        $ano = Alunos::whereYear('created_at', '=', date('Y'))->get()->toArray();;
        
        return $usuarios;

           
    }
}
