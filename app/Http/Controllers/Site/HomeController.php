<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\categoria;
use App\Models\cursos;
use App\Models\experiencia;
use App\Models\User;
use App\Models\portifolio;
use App\Models\Setting;





use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $alunos = article::paginate();
        $portifolio = portifolio::all();
        $users = User::all();
        $experiencia = experiencia::all();
        $cursos = cursos::all();
        $Setting = Setting::all();
        $categorias = categoria::all();
        return view('Site.home', [
            'alunos' => $alunos,
            'users' => $users,
            'portifolios' => $portifolio,
            'experiencias' => $experiencia,
            'cursos' => $cursos,
            'settings' => $Setting,
            'categorias' => $categorias

        ]);
    }

    public function singleBlog($id)
    {
        $alunos = article::where('id', $id)->get();
        return view('Site.blog', [
            'alunos' => $alunos

        ]);
    }
}
